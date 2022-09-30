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
class PostTest extends UnitTestCase
{
    /**
     * @var \Zz\ZzBills\Domain\Model\Post|MockObject|AccessibleObjectInterface
     */
    protected $subject;

    protected function setUp(): void
    {
        parent::setUp();

        $this->subject = $this->getAccessibleMock(
            \Zz\ZzBills\Domain\Model\Post::class,
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
    public function getNumberReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getNumber()
        );
    }

    /**
     * @test
     */
    public function setNumberForIntSetsNumber(): void
    {
        $this->subject->setNumber(12);

        self::assertEquals(12, $this->subject->_get('number'));
    }

    /**
     * @test
     */
    public function getTaxRateReturnsInitialValueForInt(): void
    {
        self::assertSame(
            0,
            $this->subject->getTaxRate()
        );
    }

    /**
     * @test
     */
    public function setTaxRateForIntSetsTaxRate(): void
    {
        $this->subject->setTaxRate(12);

        self::assertEquals(12, $this->subject->_get('taxRate'));
    }

    /**
     * @test
     */
    public function getNameReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getName()
        );
    }

    /**
     * @test
     */
    public function setNameForStringSetsName(): void
    {
        $this->subject->setName('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('name'));
    }

    /**
     * @test
     */
    public function getSubtitleReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getSubtitle()
        );
    }

    /**
     * @test
     */
    public function setSubtitleForStringSetsSubtitle(): void
    {
        $this->subject->setSubtitle('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('subtitle'));
    }

    /**
     * @test
     */
    public function getQuantityReturnsInitialValueForString(): void
    {
        self::assertSame(
            '',
            $this->subject->getQuantity()
        );
    }

    /**
     * @test
     */
    public function setQuantityForStringSetsQuantity(): void
    {
        $this->subject->setQuantity('Conceived at T3CON10');

        self::assertEquals('Conceived at T3CON10', $this->subject->_get('quantity'));
    }

    /**
     * @test
     */
    public function getSinglePriceReturnsInitialValueForFloat(): void
    {
        self::assertSame(
            0.0,
            $this->subject->getSinglePrice()
        );
    }

    /**
     * @test
     */
    public function setSinglePriceForFloatSetsSinglePrice(): void
    {
        $this->subject->setSinglePrice(3.14159265);

        self::assertEquals(3.14159265, $this->subject->_get('singlePrice'));
    }
}
