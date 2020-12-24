<?php namespace App\Views\PortalHRD\Auth\Partials;

use App\Libraries\View\BaseView;
use App\Libraries\View\TemplateEngine;

abstract class BaseAuthView extends BaseView
{
    public function render(): string
    {
        $this->startHtmlParsing(); ?>
        
            <?= TemplateEngine::view(new AuthHeader()) ?>

            <?= $this->content() ?>

            <?= TemplateEngine::view(new AuthFooter()) ?>
        
        <?php return $this->endParsingAndGetHtml();
    }

    abstract function content() : string;
}