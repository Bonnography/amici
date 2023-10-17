<?php
defined('TYPO3') or die();
call_user_func(function()
{
    /**
     * Temporary variables
     */
    $extensionKey = 'cb_template';

    /**
     * Default PageTS for CbTemplate
     */
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::registerPageTSConfigFile(
        $extensionKey,
        'Configuration/TsConfig/Page/All.tsconfig',
        'CB Template'
    );
});

// encapsulate all locally defined variables
(function () {
    // SAME as registered in ext_tables.php
    $customPageDoktype = 116;
    $customIconClass = 'actions-document-localize';

    // Add the new doktype to the page type selector
    $GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'][] = [
        'News',
        $customPageDoktype,
        $customIconClass,
        'default',
    ];
    // Add the icon to the icon class configuration
    $GLOBALS['TCA']['pages']['ctrl']['typeicon_classes'][$customPageDoktype] = 'actions-document-localize';
})();
