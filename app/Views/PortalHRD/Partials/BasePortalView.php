<?php namespace App\Views\PortalHRD\Partials;

use App\Libraries\View\BaseView;
use App\Libraries\View\TemplateEngine;
use App\Views\PortalHRD\DataContract\UserDataContract;

abstract class BasePortalView extends BaseView
{
    protected string $title;

    private UserDataContract $user;

    public function __construct(string $title, UserDataContract $user)
    {
        $this->user = $user;
        $this->title = $title;
    }

    public function render(): string
    {
        $this->startHtmlParsing(); ?>
        
            <?=TemplateEngine::view(new PortalHeader($this->title)); ?>

            <?=TemplateEngine::view(new PortalSidebar($this->title)); ?>

            <?=TemplateEngine::view(new PortalTopbar($this->user)); ?>

            <?= $this->content(); ?>

            <?= TemplateEngine::view(new PortalFooter()); ?>
        
        <?php return $this->endParsingAndGetHtml();
    }

    abstract function content(): string;
}