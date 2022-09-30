<?php

declare(strict_types=1);

namespace Zz\ZzBills\Controller;

use Zz\ZzBills\Utility\BillNumerUtility;


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
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/p/friendsoftypo3/extension-builder/master/en-us/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->billRepository->remove($bill);
        $this->redirect('list');
    }
}
