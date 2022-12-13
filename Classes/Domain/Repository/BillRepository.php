<?php

declare(strict_types=1);

namespace Zz\ZzBills\Domain\Repository;


/**
 * This file is part of the "Rechnungen" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * (c) 2022 Lukas Reeg <lukas@reeg.one>, Zauberzuber/Weinturm
 */

/**
 * The repository for Bills
 */
class BillRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{
    protected $defaultOrderings = array(
    'crdate' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING,
    'number' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
    );

    /**
     * @param $prefix
     * @param $festival
     */
    public function countByFestivalAndPrefix($prefix, $festival)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->matching($query->equals('festival', $festival));
        $query->matching($query->like('number', "%-" . $prefix . "-%"));
        return $query->execute()->count();
    }

    /**
     * @param $number
     */
    public function countByNumberStorno($number)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        $query->matching($query->like('number', "%" . $number . "%"));
        return $query->execute()->count();
    }
}
