<?php
defined('TYPO3_MODE') || die();
use TYPO3\CMS\Core\Http\ApplicationType;
/***************
 * Add default RTE configuration
 */
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['default'] = 'EXT:cb_template/Configuration/RTE/Default.yaml';
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['teaser'] = 'EXT:cb_template/Configuration/RTE/Teaser.yaml';

/***************
 * PageTS
 */
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:cb_template/Configuration/TsConfig/Page/cb_template.tsconfig">');

call_user_func(function () {
    if (ApplicationType::fromRequest($GLOBALS['TYPO3_REQUEST'])->isBackend()) {
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
            trim('
                module.tx_form {
                    settings {
                        yamlConfigurations {
                            100 = EXT:cb_template/Configuration/Form/CustomFormSetup.yaml
                            101 = EXT:cb_template/Configuration/Form/CustomBaseSetup.yaml
                        }
                    }
                }
            ')
        );
    }

});
$GLOBALS['TYPO3_CONF_VARS']['FE']['hidePagesIfNotTranslatedByDefault'] = 1;