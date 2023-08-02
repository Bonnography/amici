<?php

namespace Jlc\JlcTemplate\ViewHelpers;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class SearchForStringPartViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
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
        $strToFind = 'StröerX';
        $strToFind2 = 'StröerX.';
        $strToFind3 = 'Ströer X.';
        $strToFind4 = 'Ströer X';
        $pos = strpos($string, $strToFind);
        $pos2 = strpos($string, $strToFind2);
        $pos3 = strpos($string, $strToFind3);
        $pos4 = strpos($string, $strToFind4);
        if($pos2 !== false) {
            $string = str_ireplace('ströerx.', '<span class="color-x">'.$strToFind2.'</span>', $string);
        } elseif ($pos3 !== false) {
            $string = str_ireplace('ströer x.', '<span class="color-x">'.$strToFind3.'</span>', $string);
        } elseif ($pos4 !== false) {
            $string = str_ireplace('ströer x', '<span class="color-x">'.$strToFind4.'</span>', $string);
        } elseif ($pos !== false) {
            $string = str_ireplace('ströerx', '<span class="color-x">'.$strToFind.'</span>', $string);
        }


        return $string;
    }
}