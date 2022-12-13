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
 * Post
 */
class Post extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * number
     *
     * @var int
     */
    protected $number = 0;

    /**
     * taxRate
     *
     * @var int
     */
    protected $taxRate = 0;

    /**
     * name
     *
     * @var string
     */
    protected $name = '';

    /**
     * subtitle
     *
     * @var string
     */
    protected $subtitle = '';

    /**
     * quantity
     *
     * @var string
     */
    protected $quantity = '';

    /**
     * singlePrice
     *
     * @var float
     */
    protected $singlePrice = 0.0;

    /**
     * Returns the number
     *
     * @return int
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Sets the number
     *
     * @param int $number
     * @return void
     */
    public function setNumber(int $number)
    {
        $this->number = $number;
    }

    /**
     * Returns the taxRate
     *
     * @return int
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * Sets the taxRate
     *
     * @param int $taxRate
     * @return void
     */
    public function setTaxRate(int $taxRate)
    {
        $this->taxRate = $taxRate;
    }

    /**
     * Returns the name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the name
     *
     * @param string $name
     * @return void
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * Returns the quantity
     *
     * @return string
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Sets the quantity
     *
     * @param string $quantity
     * @return void
     */
    public function setQuantity(string $quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * Returns the singlePrice
     *
     * @return float
     */
    public function getSinglePrice()
    {
        return $this->singlePrice;
    }

    /**
     * Sets the singlePrice
     *
     * @param float $singlePrice
     * @return void
     */
    public function setSinglePrice(float $singlePrice)
    {
        $this->singlePrice = $singlePrice;
    }

    /**
     * Returns the subtitle
     *
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * Sets the subtitle
     *
     * @param string $subtitle
     * @return void
     */
    public function setSubtitle(string $subtitle)
    {
        $this->subtitle = $subtitle;
    }
    public function getTax()
    {
        $settings = \nn\t3::Settings()->getSettings('tx_zzbills_bills');
        $style = $settings['style'];
        if ($style == "B2B") {
            $summ = $this->getSummNetto();
            $tax = $summ * ($this->getTaxRate() / 100);
        } else {
            $summ = $this->getSummBrutto();
            $tax = $summ * ($this->getTaxRate() / 100);
        }
        return $tax;
    }
    public function getSummBrutto()
    {
        $settings = \nn\t3::Settings()->getSettings('tx_zzbills_bills');
        $style = $settings['style'];
        if ($style == "B2B") {
            $tax = $this->getTax();
            $summ = $this->getSinglePrice() * $this->getQuantity() + $tax;
        } else {
            $summ = $this->getSinglePrice() * $this->getQuantity();
        }
        return $summ;
    }
    public function getSummNetto()
    {
        $settings = \nn\t3::Settings()->getSettings('tx_zzbills_bills');
        $style = $settings['style'];
        if ($style == "B2B") {
            $summ = $this->getSinglePrice() * $this->getQuantity();
        } else {
            $summ = $this->getSummBrutto() - $this->getTax();
        }
        return $summ;
    }
}
