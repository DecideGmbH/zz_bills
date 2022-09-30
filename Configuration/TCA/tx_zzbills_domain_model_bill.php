<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill',
        'label' => 'number',
        'tstamp' => 'tstamp',
        'crdate' => 'crdate',
        'cruser_id' => 'cruser_id',
        'versioningWS' => true,
        'languageField' => 'sys_language_uid',
        'transOrigPointerField' => 'l10n_parent',
        'transOrigDiffSourceField' => 'l10n_diffsource',
        'delete' => 'deleted',
        'enablecolumns' => [
            'disabled' => 'hidden',
            'starttime' => 'starttime',
            'endtime' => 'endtime',
        ],
        'searchFields' => 'number,recipient_company,recipient_name,recipient_address,recipient_zip,recipient_city,recipient_mail,recipient_phone',
        'iconfile' => 'EXT:zz_bills/Resources/Public/Icons/tx_zzbills_domain_model_bill.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'number, date, recipient_company, recipient_name, recipient_address, recipient_zip, recipient_city, recipient_mail, recipient_phone, data, bill_posts, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
    ],
    'columns' => [
        'sys_language_uid' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.language',
            'config' => [
                'type' => 'language',
            ],
        ],
        'l10n_parent' => [
            'displayCond' => 'FIELD:sys_language_uid:>:0',
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.l18n_parent',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'default' => 0,
                'items' => [
                    ['', 0],
                ],
                'foreign_table' => 'tx_zzbills_domain_model_bill',
                'foreign_table_where' => 'AND {#tx_zzbills_domain_model_bill}.{#pid}=###CURRENT_PID### AND {#tx_zzbills_domain_model_bill}.{#sys_language_uid} IN (-1,0)',
            ],
        ],
        'l10n_diffsource' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
        'hidden' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.visible',
            'config' => [
                'type' => 'check',
                'renderType' => 'checkboxToggle',
                'items' => [
                    [
                        0 => '',
                        1 => '',
                        'invertStateDisplay' => true
                    ]
                ],
            ],
        ],
        'starttime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.starttime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],
        'endtime' => [
            'exclude' => true,
            'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.endtime',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'eval' => 'datetime,int',
                'default' => 0,
                'range' => [
                    'upper' => mktime(0, 0, 0, 1, 1, 2038)
                ],
                'behaviour' => [
                    'allowLanguageSynchronization' => true
                ]
            ],
        ],

        'number' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.number',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'date' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.date',
            'config' => [
                'type' => 'input',
                'renderType' => 'inputDateTime',
                'size' => 7,
                'eval' => 'date',
                'default' => time()
            ],
        ],
        'recipient_company' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.recipient_company',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'recipient_name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.recipient_name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'recipient_address' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.recipient_address',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'recipient_zip' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.recipient_zip',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'recipient_city' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.recipient_city',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'recipient_mail' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.recipient_mail',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'recipient_phone' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.recipient_phone',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'data' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.data',
            'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
                'data',
                [
                    'appearance' => [
                        'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:media.addFileReference'
                    ],
                    'foreign_types' => [
                        '0' => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ],
                        \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => [
                            'showitem' => '
                            --palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
                            --palette--;;filePalette'
                        ]
                    ],
                    'foreign_match_fields' => [
                        'fieldname' => 'data',
                        'tablenames' => 'tx_zzbills_domain_model_bill',
                        'table_local' => 'sys_file',
                    ],
                    'maxitems' => 1
                ]
            ),
            
        ],
        'bill_posts' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_bill.bill_posts',
            'config' => [
                'type' => 'inline',
                'foreign_table' => 'tx_zzbills_domain_model_post',
                'foreign_field' => 'bill',
                'maxitems' => 9999,
                'appearance' => [
                    'collapseAll' => 0,
                    'levelLinksPosition' => 'top',
                    'showSynchronizationLink' => 1,
                    'showPossibleLocalizationRecords' => 1,
                    'showAllLocalizationLink' => 1
                ],
            ],

        ],
    
    ],
];
