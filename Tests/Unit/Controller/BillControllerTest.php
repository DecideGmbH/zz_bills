<?php

declare(strict_types=1);

namespace Zz\ZzBills\Tests\Unit\Controller;

use PHPUnit\Framework\MockObject\MockObject;
use TYPO3\TestingFramework\Core\AccessibleObjectInterface;
use TYPO3\TestingFramework\Core\Unit\UnitTestCase;
use TYPO3Fluid\Fluid\View\ViewInterface;

/**
 * Test case
 *
 * @author Lukas Reeg <lukas@reeg.one>
 */
class BillControllerTest extends UnitTestCase
{
    /**
     * @var \Zz\ZzBills\Controller\BillController|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder($this->buildAccessibleProxy(\Zz\ZzBills\Controller\BillController::class))
            ->onlyMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown(): void
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllBillsFromRepositoryAndAssignsThemToView(): void
    {
        $allBills = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $billRepository = $this->getMockBuilder(\Zz\ZzBills\Domain\Repository\BillRepository::class)
            ->onlyMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $billRepository->expects(self::once())->method('findAll')->will(self::returnValue($allBills));
        $this->subject->_set('billRepository', $billRepository);

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('bills', $allBills);
        $this->subject->_set('view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenBillToView(): void
    {
        $bill = new \Zz\ZzBills\Domain\Model\Bill();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('bill', $bill);

        $this->subject->showAction($bill);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenBillToBillRepository(): void
    {
        $bill = new \Zz\ZzBills\Domain\Model\Bill();

        $billRepository = $this->getMockBuilder(\Zz\ZzBills\Domain\Repository\BillRepository::class)
            ->onlyMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $billRepository->expects(self::once())->method('add')->with($bill);
        $this->subject->_set('billRepository', $billRepository);

        $this->subject->createAction($bill);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenBillToView(): void
    {
        $bill = new \Zz\ZzBills\Domain\Model\Bill();

        $view = $this->getMockBuilder(ViewInterface::class)->getMock();
        $this->subject->_set('view', $view);
        $view->expects(self::once())->method('assign')->with('bill', $bill);

        $this->subject->editAction($bill);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenBillInBillRepository(): void
    {
        $bill = new \Zz\ZzBills\Domain\Model\Bill();

        $billRepository = $this->getMockBuilder(\Zz\ZzBills\Domain\Repository\BillRepository::class)
            ->onlyMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $billRepository->expects(self::once())->method('update')->with($bill);
        $this->subject->_set('billRepository', $billRepository);

        $this->subject->updateAction($bill);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenBillFromBillRepository(): void
    {
        $bill = new \Zz\ZzBills\Domain\Model\Bill();

        $billRepository = $this->getMockBuilder(\Zz\ZzBills\Domain\Repository\BillRepository::class)
            ->onlyMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $billRepository->expects(self::once())->method('remove')->with($bill);
        $this->subject->_set('billRepository', $billRepository);

        $this->subject->deleteAction($bill);
    }
}
