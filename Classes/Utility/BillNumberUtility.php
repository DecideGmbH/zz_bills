<?php

declare(strict_types=1);

namespace Zz\ZzBills\Utility;



class BillNumberUtility implements \TYPO3\CMS\Core\SingletonInterface
{

    
    public static function getBillNumber($suffix = null) {        
        $queryBuilder = \nn\t3::Db()->getQueryBuilder( 'tx_zzbills_domain_model_bill' );
        $now = new \DateTime();
        $year =  $now->format('Y');
        $yearShort =  $now->format('y');
        $yearStart =  strtotime($year.'-01-01');
        $yearEnd =  strtotime($year.'-12-31');
        $query = $queryBuilder
            ->select('*')
            ->from('tx_zzbills_domain_model_bill')
            ->where('tx_zzbills_domain_model_bill.date >= "'.$yearStart.'" AND tx_zzbills_domain_model_bill.date <= "'.$yearEnd.'"');

        $rows = $query->execute()->fetchAll();
        $number = (int) count($rows)+1;
        $number = $yearShort."-".str_pad((string) $number, 5, "0", STR_PAD_LEFT);
        return $number;
    }
}