<?php
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'Cards',
        'cards',
        'EXT:cb_template/Resources/Public/images/backend/icon.svg'
    ),
    'CType',
    'cb_template'
);
$cards = [
    'card_layout' => [
        'exclude' => 1,
        'label' => 'Card Layout',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            'eval' => 'required',
            'items' => [
                ['2 Spaltig', 1],
                ['3 Spaltig', 2],
            ],
        ],
    ],
    'cardsitem_header' => [
        'exclude' => 1,
        'label' => 'LLL:EXT:cb_template/Resources/Private/Language/locallang_tca.xlf:tt_content.cardsitem_header',
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
        ],
    ],
    'image' => [
        'label' => 'LLL:EXT:core/Resources/Private/Language/locallang_general.xlf:LGL.images',
        'config' => [
            'type' => 'file',
            'allowed' => 'common-image-types',
            'appearance' => [
                'createNewRelationLinkTitle' => 'LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:images.addFileReference'
            ],
        ]
    ],
    'cardsitem' => [
        'exclude' => true,
        'label' => 'Card',
        'config' => [
            'type' => 'inline',
            'foreign_table' => 'tt_content',
            'foreign_field' => 'cards_container',
            'foreign_label' => 'cardsitem_header',
            'maxitems' => 999,
            'foreign_record_defaults' => array(
                'colPos' => '999',
                'CType' => 'text'
            ),
            'overrideChildTca' => [
                'columns' => [
                    'CType' => [
                        'config' => [
                            'default' => 'text',
                        ],
                    ],
                    'colPos' => [
                        'config' => [
                            'default' => 999
                        ]
                    ],
                ],
                'types' => [
                    'text' => [
                        'showitem' =>
                            '--palette--;LLL:EXT:cb_template/Resources/Private/Language/locallang_tca.xlf:cardsitem;cards_palette,',
                    ],
                ],
            ],
        ],
    ],
];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $cards);

$GLOBALS['TCA']['tt_content']['palettes']['cards_palette']['showitem'] = '
     colPos, sys_language_uid, l10n_parent,
    --linebreak--,
    image,
      --linebreak--,
    cardsitem_header,
    --linebreak--,
    bodytext;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:bodytext_formlabel,
';


$GLOBALS['TCA']['tt_content']['types']['cards']['showitem'] = '
--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
    --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.headers;header_text,card_layout,cardsitem,
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
--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,
--div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
';