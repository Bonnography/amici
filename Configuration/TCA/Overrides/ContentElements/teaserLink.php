<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'Teaser Link',
        'teaserLink',
        'EXT:avedo_template/Resources/Public/images/backend/icon.svg'
    ),
    'CType',
    'cb_template'
);
$teaserLink = [
    'teaser_headline' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:cb_template/Resources/Private/Language/locallang_tca.xlf:teaser_headline',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
        ],
    ],
    'teaserItem_link' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:cb_template/Resources/Private/Language/locallang_tca.xlf:teaserItem_link',
        'config' => [
            'type' => 'input',
            'renderType' => 'inputLink',
        ],
    ],
    'teaserItem' => [
        'exclude' => true,
        'label' => 'Teaser Item',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tt_content',
            'foreign_field' => 'teaserItem_container',
            'foreign_label' => 'teaser_headline',
            'maxitems' => 99,
            'foreign_record_defaults' => array(
                'colPos' => '999',
                'CType' => 'text'
            ),
            'overrideChildTca' => [
                'columns' => [
                    'colPos' => [
                        'config' => [
                            'default' => 999
                        ]
                    ],
                    'CType' => [
                        'config' => [
                            'default' => 'text',
                        ],
                    ],
                ],
                'types' => [
                    'text' => [
                        'showitem' =>
                            '--palette--;LLL:EXT:cb_template/Resources/Private/Language/locallang_tca.xlf:teaserItem;teaser_palette',
                        'columnsOverrides' => [
                            'image' => [
                                'config' => [
                                    'maxitems' => '1',
                                ],
                            ],
                        ]
                    ],
                ],
            ],
        ],
    ],
];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $teaserLink);

$GLOBALS['TCA']['tt_content']['palettes']['teaser_palette']['showitem'] = '
     colPos, sys_language_uid, l10n_parent,
      --linebreak--,
    teaser_headline,teaserItem_link,
     --linebreak--,
     image,bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
';

$GLOBALS['TCA']['tt_content']['types']['teaserLink']['showitem'] = '
--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,header_position,
    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;header_text,teaserItem,
--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
--palette--;;language,
--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
--palette--;;hidden,
--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
--div--;LLL:EXT:lang/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,
--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
';