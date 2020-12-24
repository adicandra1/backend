<?php namespace App\Views\PortalHRD\Users;

use App\Views\PortalHRD\Partials\BasePortalView;

class GroupList extends BasePortalView
{
    public function content(): string
    {
        $this->startHtmlParsing(); ?>
        
            
        
        <?php return $this->endParsingAndGetHtml();
    }
}