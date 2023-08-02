<?php

namespace Jlc\JlcTemplate\ViewHelpers;


use TYPO3\CMS\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class ApplicationContextViewHelper extends \TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper
{
    use CompileWithRenderStatic;

    public function render() {
        $applicationContext = \TYPO3\CMS\Core\Core\Environment::getContext();
        return $applicationContext;
    }
}