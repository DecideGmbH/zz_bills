<?php
return [
    'ctrl' => [
        'title' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_post',
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
        'searchFields' => 'name,subtitle,quantity',
        'iconfile' => 'EXT:zz_bills/Resources/Public/Icons/tx_zzbills_domain_model_post.gif'
    ],
    'types' => [
        '1' => ['showitem' => 'number, tax_rate, name, subtitle, quantity, single_price, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language, sys_language_uid, l10n_parent, l10n_diffsource, --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access, hidden, starttime, endtime'],
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
                'foreign_table' => 'tx_zzbills_domain_model_post',
                'foreign_table_where' => 'AND {#tx_zzbills_domain_model_post}.{#pid}=###CURRENT_PID### AND {#tx_zzbills_domain_model_post}.{#sys_language_uid} IN (-1,0)',
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
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_post.number',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        'tax_rate' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_post.tax_rate',
            'config' => [
                'type' => 'input',
                'size' => 4,
                'eval' => 'int',
                'default' => 0
            ]
        ],
        'name' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_post.name',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'subtitle' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_post.subtitle',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'quantity' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_post.quantity',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'trim',
                'default' => ''
            ],
        ],
        'single_price' => [
            'exclude' => true,
            'label' => 'LLL:EXT:zz_bills/Resources/Private/Language/locallang_db.xlf:tx_zzbills_domain_model_post.single_price',
            'config' => [
                'type' => 'input',
                'size' => 30,
                'eval' => 'double2'
            ]
        ],
    
        'bill' => [
            'config' => [
                'type' => 'passthrough',
            ],
        ],
    ],
];
