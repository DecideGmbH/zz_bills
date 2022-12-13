<?php

declare(strict_types=1);

namespace Zz\ZzBills\Tests\Unit\Domain\Model;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;

/**
 * Test case
 *
 * @author Lukas Reeg <lukas@reeg.one>
 */
class BillTest extends UnitTestCase
{
    /**
     * @var \Zz\ZzBills\Domain\Model\Bill|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Zz\ZzBills\Domain\Model\Bill::class,
            ['dummy']
        );
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getNumberReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberForStringSetsNumber(): void
    {
        $this->subject->setNumber('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('number'));
    }

    /**
     * @test
     */
    public function getDateReturnsInitialValueForDateTime(): void
    {
        self::assertEquals(
            null,
            $this->subject->getDate()
        );
    }

    /**
     * @test
     */
    public function setDateForDateTimeSetsDate(): void
    {
        $dateTimeFixture = new \DateTime();
        $this->subject->setDate($dateTimeFixture);

        self::assertEquals($dateTimeFixture, $this->subject->_get('date'));
    }

    /**
     * @test
     */
    public function getRecipientCompanyReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getRecipientCompany()
        );
    }

    /**
     * @test
     */
    public function setRecipientCompanyForStringSetsRecipientCompany(): void
    {
        $this->subject->setRecipientCompany('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('recipientCompany'));
    }

    /**
     * @test
     */
    public function getRecipientNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getRecipientName()
        );
    }

    /**
     * @test
     */
    public function setRecipientNameForStringSetsRecipientName(): void
    {
        $this->subject->setRecipientName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('recipientName'));
    }

    /**
     * @test
     */
    public function getRecipientAddressReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getRecipientAddress()
        );
    }

    /**
     * @test
     */
    public function setRecipientAddressForStringSetsRecipientAddress(): void
    {
        $this->subject->setRecipientAddress('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('recipientAddress'));
    }

    /**
     * @test
     */
    public function getRecipientZipReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getRecipientZip()
        );
    }

    /**
     * @test
     */
    public function setRecipientZipForStringSetsRecipientZip(): void
    {
        $this->subject->setRecipientZip('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('recipientZip'));
    }

    /**
     * @test
     */
    public function getRecipientCityReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getRecipientCity()
        );
    }

    /**
     * @test
     */
    public function setRecipientCityForStringSetsRecipientCity(): void
    {
        $this->subject->setRecipientCity('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('recipientCity'));
    }

    /**
     * @test
     */
    public function getRecipientMailReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getRecipientMail()
        );
    }

    /**
     * @test
     */
    public function setRecipientMailForStringSetsRecipientMail(): void
    {
        $this->subject->setRecipientMail('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('recipientMail'));
    }

    /**
     * @test
     */
    public function getRecipientPhoneReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getRecipientPhone()
        );
    }

    /**
     * @test
     */
    public function setRecipientPhoneForStringSetsRecipientPhone(): void
    {
        $this->subject->setRecipientPhone('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('recipientPhone'));
    }

    /**
     * @test
     */
    public function getDataReturnsInitialValueForFileReference(): void
    {
        self::assertEquals(
            null,
            $this->subject->getData()
        );
    }

    /**
     * @test
     */
    public function setDataForFileReferenceSetsData(): void
    {
        $fileReferenceFixture = new \TYPO3\CMS\Extbase\Domain\Model\FileReference();
        $this->subject->setData($fileReferenceFixture);

        self::assertEquals($fileReferenceFixture, $this->subject->_get('data'));
    }

    /**
     * @test
     */
    public function getCommentReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getComment()
        );
    }

    /**
     * @test
     */
    public function setCommentForStringSetsComment(): void
    {
        $this->subject->setComment('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('comment'));
    }

    /**
     * @test
     */
    public function getBillPostsReturnsInitialValueForPost(): void
    {
        $newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        self::assertEquals(
            $newObjectStorage,
            $this->subject->getBillPosts()
        );
    }

    /**
     * @test
     */
    public function setBillPostsForObjectStorageContainingPostSetsBillPosts(): void
    {
        $billPost = new \Zz\ZzBills\Domain\Model\Post();
        $objectStorageHoldingExactlyOneBillPosts = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
        $objectStorageHoldingExactlyOneBillPosts->attach($billPost);
        $this->subject->setBillPosts($objectStorageHoldingExactlyOneBillPosts);

        self::assertEquals($objectStorageHoldingExactlyOneBillPosts, $this->subject->_get('billPosts'));
    }

    /**
     * @test
     */
    public function addBillPostToObjectStorageHoldingBillPosts(): void
    {
        $billPost = new \Zz\ZzBills\Domain\Model\Post();
        $billPostsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['attach'])
            ->disableOriginalConstructor()
            ->getMock();

        $billPostsObjectStorageMock->expects(self::once())->method('attach')->with(self::equalTo($billPost));
        $this->subject->_set('billPosts', $billPostsObjectStorageMock);

        $this->subject->addBillPost($billPost);
    }

    /**
     * @test
     */
    public function removeBillPostFromObjectStorageHoldingBillPosts(): void
    {
        $billPost = new \Zz\ZzBills\Domain\Model\Post();
        $billPostsObjectStorageMock = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->onlyMethods(['detach'])
            ->disableOriginalConstructor()
            ->getMock();

        $billPostsObjectStorageMock->expects(self::once())->method('detach')->with(self::equalTo($billPost));
        $this->subject->_set('billPosts', $billPostsObjectStorageMock);

        $this->subject->removeBillPost($billPost);
    }
}
