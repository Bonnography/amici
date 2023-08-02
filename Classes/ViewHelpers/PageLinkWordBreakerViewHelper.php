<?php

namespace Jlc\JlcTemplate\ViewHelpers;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class PageLinkWordBreakerViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
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
        $input = $this->arguments['string'];
        $arr = explode(' ', trim($input));
        $replace = array(0 => $arr[0].' <br/>');
        $replacedArr = array_replace($arr, $replace);
        $string = implode($replacedArr);

        return $string;
    }
}