<?php

namespace Jlc\JlcTemplate\ViewHelpers;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class PageLinkBodyTextWordBreakerViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
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
        $stringwidth = 150;
        $input = $this->arguments['string'];
        $strToFind = '<p class="text-center">';

        if(strpos($input, $strToFind) !== false) {
            $string = $input;
        } else {
            $string = strip_tags($input);
            $strLength = strlen($string);

            if($strLength > $stringwidth) {
                $stringLength = substr($string, 0, strrpos( substr( $string, 0, $stringwidth), '.' ));
                $string = '<p>'.$stringLength.'.</p>';
            }
        }
        return $string;
    }
}