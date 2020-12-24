<?php namespace App\Views\PortalHRD\Users\Partials;

use App\Libraries\View\BaseView;
use App\Views\PortalHRD\ViewRoutesContract;

class FormAddPermission extends BaseView
{
    public function render(): string
    {
        $this->startHtmlParsing(); ?>
        
        <form name="addPermission" action="<?= route_to(ViewRoutesContract::PORTALHRD_ADDPERMISSIONUSER) ?>" method="POST">
            
            <div class="form-group row">
                <label for="Name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Name" name="name" placeholder="permission name">
                </div>
            </div>
            <div class="form-group row">
                <label for="description" class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="description" name="description" placeholder=" permission description">
                </div>
            </div>

            <input type="submit" id="submit-form" class="hidden" />
        </form>
        
        <?php return $this->endParsingAndGetHtml();
    }
}