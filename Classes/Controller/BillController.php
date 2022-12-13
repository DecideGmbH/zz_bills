<?php

declare(strict_types=1);

namespace Zz\ZzBills\Controller;

use Zz\ZzBills\Utility\BillNumberUtility;

/**
 * This file is part of the "Rechnungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Lukas Reeg <lukas@reeg.one>, Zauberzuber/Weinturm
 */

/**
 * BillController
 */
class BillController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{

    /**
     * billRepository
     *
     * @var \Zz\ZzBills\Domain\Repository\BillRepository
     */
    protected $billRepository = null;

    /**
     * @param \Zz\ZzBills\Domain\Repository\BillRepository $billRepository
     */
    public function injectBillRepository(\Zz\ZzBills\Domain\Repository\BillRepository $billRepository)
    {
        $this->billRepository = $billRepository;
    }
    
    public function initializeCreateAction()
    {
        if ($this->arguments->hasArgument('newBill')) {
            $config = $this->arguments->getArgument('newBill')->getPropertyMappingConfiguration();
            $config->allowProperties('billPosts');
            $config->forProperty('billPosts')->allowProperties('taxRate', 'quantity', 'singlePrice', 'name', 'subtitle');
            $config->allowCreationForSubProperty('billPosts');
            $config->allowProperties('billPosts');
            $config->forProperty('billPosts.*')->allowProperties('taxRate', 'quantity', 'singlePrice', 'name', 'subtitle');
            $config->allowCreationForSubProperty('billPosts.*');
            $config->allowModificationForSubProperty('billPosts.*');
            $config->forProperty('date')->setTypeConverterOption(\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::class, \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        }
    }
    public function initializeUpdateAction()
    {
        if ($this->arguments->hasArgument('bill')) {
            $config = $this->arguments->getArgument('bill')->getPropertyMappingConfiguration();
            $config->allowProperties('billPosts');
            $config->forProperty('billPosts')->allowProperties('taxRate', 'quantity', 'singlePrice', 'name', 'subtitle');
            $config->allowCreationForSubProperty('billPosts');
            $config->allowProperties('billPosts');
            $config->forProperty('billPosts.*')->allowProperties('taxRate', 'quantity', 'singlePrice', 'name', 'subtitle');
            $config->allowCreationForSubProperty('billPosts.*');
            $config->allowModificationForSubProperty('billPosts.*');
            $config->allowProperties('billPosts');
            $config->forProperty('date')->setTypeConverterOption(\TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::class, \TYPO3\CMS\Extbase\Property\TypeConverter\DateTimeConverter::CONFIGURATION_DATE_FORMAT, 'd.m.Y');
        }
    }

    /**
     * action list
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function listAction(): \Psr\Http\Message\ResponseInterface
    {
        $bills = $this->billRepository->findAll();
        $this->view->assign('bills', $bills);
        return $this->htmlResponse();
    }

    /**
     * action show
     *
     * @param \Zz\ZzBills\Domain\Model\Bill $bill
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function showAction(\Zz\ZzBills\Domain\Model\Bill $bill): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('bill', $bill);
        return $this->htmlResponse();
    }

    /**
     * action new
     *
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function newAction(): \Psr\Http\Message\ResponseInterface
    {
        $number = BillNumberUtility::getBillNumber();
        $user = \nn\t3::FrontendUser()->getCurrentUser();
        $this->view->assign('user', $user);
        $this->view->assign('number', $number);
        return $this->htmlResponse();
    }

    /**
     * action create
     *
     * @param \Zz\ZzBills\Domain\Model\Bill $newBill
     */
    public function createAction(\Zz\ZzBills\Domain\Model\Bill $newBill)
    {
        $this->addFlashMessage('Rechnung erfolgreich angelegt.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->billRepository->add($newBill);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Zz\ZzBills\Domain\Model\Bill $bill
     * @TYPO3\CMS\Extbase\Annotation\IgnoreValidation("bill")
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function editAction(\Zz\ZzBills\Domain\Model\Bill $bill): \Psr\Http\Message\ResponseInterface
    {
        $this->view->assign('bill', $bill);
        return $this->htmlResponse();
    }

    /**
     * action update
     *
     * @param \Zz\ZzBills\Domain\Model\Bill $bill
     */
    public function updateAction(\Zz\ZzBills\Domain\Model\Bill $bill)
    {
        $this->addFlashMessage('Rechnung erfolgreich geändert', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->billRepository->update($bill);
        $this->redirect('list');
    }
    
    /**
     * action delete
     *
     * @param \Zz\ZzBills\Domain\Model\Bill $bill
     */
    public function deleteAction(\Zz\ZzBills\Domain\Model\Bill $bill)
    {
        $storno = $this->deepcopy($bill);
        $storno->setNumber($storno->getNumber()."-S");
        foreach($storno->getBillPosts() as $post) {
            $post->setSinglePrice($post->getSinglePrice()*-1);
        }
        $this->billRepository->add($storno);
        
        $this->addFlashMessage('Storno wurde erstellt.', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::OK);
        $this->redirect('list');
    }
    
    private function deepcopy($object)
    {
        $clone = $this->objectManager->get(get_class($object));
        $properties = \TYPO3\CMS\Extbase\Reflection\ObjectAccess::getGettableProperties($object);
        foreach ($properties as $propertyName => $propertyValue) {
            if ($propertyValue instanceof \TYPO3\CMS\Extbase\Persistence\ObjectStorage) {
                $v = $this->objectManager->get(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class);
                foreach($propertyValue as $subObject) {
                    $subClone = $this->deepcopy($subObject);
                    $v->attach($subClone);
                }
            } else { 
                $v = $propertyValue;
            }
            if ($v !== null) {
                \TYPO3\CMS\Extbase\Reflection\ObjectAccess::setProperty($clone, $propertyName, $v);
            }
        }
        return $clone;
    }
}
