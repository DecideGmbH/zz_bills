<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Rechnungen',
    'description' => 'Rechnungsverwaltung',
    'category' => 'plugin',
    'author' => 'Lukas Reeg',
    'author_email' => 'lukas@reeg.one',
    'state' => 'alpha',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '11.5.0-11.5.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
