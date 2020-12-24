<?php namespace App\Views\PortalHRD\Users\Partials;

use App\Libraries\View\BaseView;
use App\Views\PortalHRD\ViewRoutesContract;

class FormAddUser extends BaseView
{
    public function render(): string
    {
        $this->startHtmlParsing(); ?>
        
        <form name="addUser" action="<?= route_to(ViewRoutesContract::PORTALHRD_ADDUSER) ?>" method="POST">
            <div class="form-group row">
                <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control-file" id="image" name="image">
                </div>
            </div>

            <div class="form-group row">
                <label for="Profession" class="col-sm-2 col-form-label">Profession</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Profession" name="profession" placeholder="profesion">
                </div>
            </div>
            <div class="form-group row">
                <label for="Company" class="col-sm-2 col-form-label">Company</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="Company" name="company" placeholder="company">
                </div>
            </div>
            <div class="form-group row">
                <label for="date" class="col-sm-2 col-form-label">Valid Date</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" id="date" placeholder="Valid date" name="valid_date">
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row">
                    <legend class="col-form-label col-sm-2 pt-0">Type</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type1" value="job">
                            <label class="form-check-label" for="type1">Job</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="type" id="type2" value="intership">
                            <label class="form-check-label" for="type2">Intership</label>
                        </div>
                    </div>
                </div>
            </fieldset>

            <div class="form-group row">
                <label for="job_description" class="col-sm-2 col-form-label">Job Description</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" placeholder="job description!" id="job_description"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="requirement" class="col-sm-2 col-form-label">Requirement</label>
                <div class="col-sm-10">
                    <textarea type="text" class="form-control" placeholder="requirement!" id="requirement"></textarea>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="<?= route_to(ViewRoutesContract::PORTALHRD_VACANCYLIST) ?>" class="btn btn-warning">Cancel</></a>
                </div>
            </div>
            <input type="submit" id="submit-form" class="hidden" />
        </form>
        
        <?php return $this->endParsingAndGetHtml();
    }
}