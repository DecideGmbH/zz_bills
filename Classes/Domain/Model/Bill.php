<?php

declare(strict_types=1);

namespace Zz\ZzBills\Domain\Model;


/**
 * This file is part of the "Rechnungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Lukas Reeg <lukas@reeg.one>, Zauberzuber/Weinturm
 */

/**
 * Bill
 */
class Bill extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * number
     *
     * @var string
     */
    protected $number = '';

    /**
     * date
     *
     * @var \DateTime
     */
    protected $date = null;

    /**
     * recipientCompany
     *
     * @var string
     */
    protected $recipientCompany = '';

    /**
     * recipientName
     *
     * @var string
     */
    protected $recipientName = '';

    /**
     * recipientAddress
     *
     * @var string
     */
    protected $recipientAddress = '';

    /**
     * recipientZip
     *
     * @var string
     */
    protected $recipientZip = '';

    /**
     * recipientCity
     *
     * @var string
     */
    protected $recipientCity = '';

    /**
     * recipientMail
     *
     * @var string
     */
    protected $recipientMail = '';

    /**
     * recipientPhone
     *
     * @var string
     */
    protected $recipientPhone = '';

    /**
     * data
     *
     * @var \TYPO3\CMS\Extbase\Domain\Model\FileReference
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $data = null;

    /**
     * billPosts
     *
     * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Zz\ZzBills\Domain\Model\Post>
     * @TYPO3\CMS\Extbase\Annotation\ORM\Cascade("remove")
     */
    protected $billPosts = null;

    /**
     * __construct
     */
    public function __construct()
    {

        // Do not remove the next line: It would break the functionality
        $this->initializeObject();
    }

    /**
     * Initializes all ObjectStorage properties when model is reconstructed from DB (where __construct is not called)
     * Do not modify this method!
     * It will be rewritten on each save in the extension builder
     * You may modify the constructor of this class instead
     *
     * @return void
     */
    public function initializeObject()
    {
        $this->billPosts = $this->billPosts ?: new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
    }

    /**
     * Returns the number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the number
     *
     * @param string $number
     * @return void
     */
    public function setNumber(string $number)
    {
        $this->number = $number;
    }

    /**
     * Returns the date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Sets the date
     *
     * @param \DateTime $date
     * @return void
     */
    public function setDate(\DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * Returns the recipientName
     *
     * @return string
     */
    public function getRecipientName()
    {
        return $this->recipientName;
    }

    /**
     * Sets the recipientName
     *
     * @param string $recipientName
     * @return void
     */
    public function setRecipientName(string $recipientName)
    {
        $this->recipientName = $recipientName;
    }

    /**
     * Returns the recipientAddress
     *
     * @return string
     */
    public function getRecipientAddress()
    {
        return $this->recipientAddress;
    }

    /**
     * Sets the recipientAddress
     *
     * @param string $recipientAddress
     * @return void
     */
    public function setRecipientAddress(string $recipientAddress)
    {
        $this->recipientAddress = $recipientAddress;
    }

    /**
     * Returns the recipientZip
     *
     * @return string
     */
    public function getRecipientZip()
    {
        return $this->recipientZip;
    }

    /**
     * Sets the recipientZip
     *
     * @param string $recipientZip
     * @return void
     */
    public function setRecipientZip(string $recipientZip)
    {
        $this->recipientZip = $recipientZip;
    }

    /**
     * Returns the recipientCity
     *
     * @return string
     */
    public function getRecipientCity()
    {
        return $this->recipientCity;
    }

    /**
     * Sets the recipientCity
     *
     * @param string $recipientCity
     * @return void
     */
    public function setRecipientCity(string $recipientCity)
    {
        $this->recipientCity = $recipientCity;
    }

    /**
     * Returns the recipientMail
     *
     * @return string
     */
    public function getRecipientMail()
    {
        return $this->recipientMail;
    }

    /**
     * Sets the recipientMail
     *
     * @param string $recipientMail
     * @return void
     */
    public function setRecipientMail(string $recipientMail)
    {
        $this->recipientMail = $recipientMail;
    }

    /**
     * Returns the recipientPhone
     *
     * @return string
     */
    public function getRecipientPhone()
    {
        return $this->recipientPhone;
    }

    /**
     * Sets the recipientPhone
     *
     * @param string $recipientPhone
     * @return void
     */
    public function setRecipientPhone(string $recipientPhone)
    {
        $this->recipientPhone = $recipientPhone;
    }

    /**
     * Adds a Post
     *
     * @param \Zz\ZzBills\Domain\Model\Post $billPost
     * @return void
     */
    public function addBillPost(\Zz\ZzBills\Domain\Model\Post $billPost)
    {
        $this->billPosts->attach($billPost);
    }

    /**
     * Removes a Post
     *
     * @param \Zz\ZzBills\Domain\Model\Post $billPostToRemove The Post to be removed
     * @return void
     */
    public function removeBillPost(\Zz\ZzBills\Domain\Model\Post $billPostToRemove)
    {
        $this->billPosts->detach($billPostToRemove);
    }

    /**
     * Returns the billPosts
     *
     * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Zz\ZzBills\Domain\Model\Post>
     */
    public function getBillPosts()
    {
        return $this->billPosts;
    }

    /**
     * Sets the billPosts
     *
     * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\Zz\ZzBills\Domain\Model\Post> $billPosts
     * @return void
     */
    public function setBillPosts(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $billPosts)
    {
        $this->billPosts = $billPosts;
    }

    /**
     * Returns the data
     *
     * @return \TYPO3\CMS\Extbase\Domain\Model\FileReference
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the data
     *
     * @param \TYPO3\CMS\Extbase\Domain\Model\FileReference $data
     * @return void
     */
    public function setData(\TYPO3\CMS\Extbase\Domain\Model\FileReference $data)
    {
        $this->data = $data;
    }
    public function getTaxArray()
    {
        $taxArray = [];
        foreach ($this->getBillPosts() as $post) {
            $taxArray[$post->getTaxRate()] += $post->getTax();
        }
        return $taxArray;
    }
    public function getTax()
    {
        $summ = 0;
        foreach ($this->getBillPosts() as $post) {
            $summ += $post->getTax();
        }
        return $summ;
    }
    public function getSummBrutto()
    {
        $summ = 0;
        foreach ($this->getBillPosts() as $post) {
            $summ += $post->getSummBrutto();
        }
        return $summ;
    }
    public function getSummNetto()
    {
        $summ = 0;
        foreach ($this->getBillPosts() as $post) {
            $summ += $post->getSummNetto();
        }
        return $summ;
    }

    /**
     * Returns the recipientCompany
     *
     * @return string
     */
    public function getRecipientCompany()
    {
        return $this->recipientCompany;
    }

    /**
     * Sets the recipientCompany
     *
     * @param string $recipientCompany
     * @return void
     */
    public function setRecipientCompany(string $recipientCompany)
    {
        $this->recipientCompany = $recipientCompany;
    }
}
