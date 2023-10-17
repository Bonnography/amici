<?php
/**
 * Created by PhpStorm.
 * User: bbom
 * Date: 17.04.2018
 * Time: 10:34
 */

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPlugin(
    array(
        'Pages Overview',
        'pagesOverview',
        'EXT:cb_template/Resources/Public/images/backend/icon.svg'
    ),
    'CType',
    'cb_template'
);

$pagesOverview = [
    ];

$GLOBALS['TCA']['tt_content']['types']['pagesOverview']['showitem'] = '
         --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
                    --palette--;;general,
                    --palette--;;headers,
                    pages;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:pages.ALT.menu_formlabel,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                    --palette--;;frames,
                    --palette--;;appearanceLinks,
                --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.accessibility,
                    --palette--;;menu_accessibility,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                    --palette--;;language,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                    --palette--;;hidden,
                    --palette--;;access,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                    rowDescription,
                --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
    ';