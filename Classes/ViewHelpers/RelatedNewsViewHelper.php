<?php

namespace CodebombWebsolutions\CbTemplate\ViewHelpers;


use TYPO3Fluid\Fluid\Core\ViewHelper\AbstractViewHelper;
use TYPO3Fluid\Fluid\Core\ViewHelper\Traits\CompileWithRenderStatic;

class RelatedNewsViewHelper extends AbstractViewHelper
{
    use CompileWithRenderStatic;

    public function initializeArguments()
    {
        $this->registerArgument('newsArray', 'array', true);
    }

    public function render() {
        $newsArray = $this->arguments['newsArray'];

        $mostRecent = 0;
        $relatedNews = [];
        foreach ($newsArray as $news)
        {
            $date = $news['data']['crdate'];
            //debug($date);
            if ($date > $mostRecent) {
                $mostRecent = $date;
            }
            //debug($mostRecent);
            if ($news['data']['crdate'] === $mostRecent) {
                $relatedNews = $news;
            }

        }

        return $relatedNews;
    }
}