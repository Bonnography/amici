<?php

namespace Jlc\JlcTemplate\ViewHelpers;

use TYPO3\CMS\Core\Page\PageRenderer;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Fluid\Core\Rendering\RenderingContextInterface;
use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class AccordionHrefTitleViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
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
        $input = trim($input);
        $string = str_replace(' ', '-', $input);
        $search = array('/ß/','/Ä/','/Ö/','/Ü/','/ä/','/ö/','/ü/', '/\s+/');
        $ersetzen = array('sz','Ae','Oe','Ue','ae','oe','ue', '-');
        $wert = preg_replace($search, $ersetzen, $string);
        $string = strtolower($wert);
        $string = str_replace('&shy;', '', $string);

        return $string;
    }
}