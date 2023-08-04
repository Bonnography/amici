<?php

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

defined('TYPO3') or die('Access denied.');
/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['cb_template'] = 'EXT:cb_template/Configuration/RTE/Default.yaml';

/***************
 * PageTS
 */
ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:cb_template/Configuration/TsConfig/Page/All.tsconfig">');

// Add custom doktype to the page tree toolbar
ExtensionManagementUtility::addUserTSConfig(
    "@import 'EXT:cb_template/Configuration/TsConfig/User/*.tsconfig'"
);