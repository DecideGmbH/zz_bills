<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_zzbills_domain_model_bill', 'EXT:zz_bills/Resources/Private/Language/locallang_csh_tx_zzbills_domain_model_bill.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_zzbills_domain_model_bill');

    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_zzbills_domain_model_post', 'EXT:zz_bills/Resources/Private/Language/locallang_csh_tx_zzbills_domain_model_post.xlf');
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_zzbills_domain_model_post');
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder