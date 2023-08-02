<?php

namespace Jlc\JlcTemplate\ViewHelpers;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class ExplodeStringViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    use CompileWithRenderStatic;

    public function initializeArguments()
    {
        $this->registerArgument('string', 'string', true);
    }
    /**
     * Replace the $searchFor string with $replaceString in $string
     *
     * @param $string string
     *
     * @return string
     */
    public function render() {
        $string = $this->arguments['string'];
        $string_arr = explode("-", $string);
        if (count($string_arr) > 2) {
            $string = $string_arr['1'].'-'.$string_arr['2'];
        } else {
            $string = $string_arr['1'];
        }
        return $string;
    }
}