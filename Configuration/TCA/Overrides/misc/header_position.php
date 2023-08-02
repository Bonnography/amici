<?php

$header_position = [
    'header_position' => [
        'exclude' => 1,
        'label' => 'Header Position',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'items' => [
                ['Top', '0'],
                ['Center', '1'],
                ['Bottom', '2'],
            ],
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $header_position);