<?php
defined('TYPO3') || die();

(static function() {
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
        'ZzBills',
        'Bills',
        [
            \Zz\ZzBills\Controller\BillController::class => 'list, show, new, create, edit, update, delete'
        ],
        // non-cacheable actions
        [
            \Zz\ZzBills\Controller\BillController::class => 'list, show, new, create, edit, update, delete'
        ]
    );

    // wizards
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
        'mod {
            wizards.newContentElement.wizardItems.plugins {
                elements {
                    bills {
                        iconIdentifier = zz_bills-plugin-bills
                        title = LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zz_bills_bills.name
                        description = LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zz_bills_bills.description
                        tt_content_defValues {
                            CType = list
                            list_type = zzbills_bills
                        }
                    }
                }
                show = *
            }
       }'
    );
})();
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder