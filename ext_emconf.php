<?php

/**
 * Extension Manager/Repository config file for ext "cb_template".
 */
$EM_CONF[$_EXTKEY] = [
    'title' => 'Cbw Template',
    'description' => 'Sitepackage for TYPO3 from CodeBomb-Websolutions',
    'category' => 'templates',
    'constraints' => [
        'depends' => [
            'typo3' => '10.2.0-12.9.99'
        ],
        'conflicts' => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'Cbw\\CbTemplate\\' => 'Classes',
        ],
    ],
    'state' => 'stable',
    'uploadfolder' => 0,
    'createDirs' => '',
    'clearCacheOnLoad' => 1,
    'author' => 'Benjamin Bomberg',
    'author_email' => 'benjamin.bomberg@codebomb-websolutions.de',
    'author_company' => 'CodeBomb-Websolutions',
    'version' => '1.0.2',
];
