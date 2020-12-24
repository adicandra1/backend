<?php

namespace App\Views\PortalHRD\Vacancy;

use App\Views\PortalHRD\DataContract\UserDataContract;
use App\Views\PortalHRD\DataContract\VacancyDataContract;
use App\Views\PortalHRD\Partials\BasePortalView;
use App\Views\PortalHRD\ViewRoutesContract;

class EditVacancyView extends BasePortalView
{
    private string $title;

    private VacancyDataContract $vacancy;

    public function __construct(UserDataContract $user, VacancyDataContract $vacancy)
    {
        $this->title = "Edit Vacancy";
        parent::__construct($this->title, $user);
        $this->vacancy = $vacancy;
    }

    

    public function content(): string
    {
        
        $this->startHtmlParsing(); ?>

        <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h1 text-white d-inline-block mb-0"><?= $this->title; ?></h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="<?= route_to(ViewRoutesContract::PORTALHRD_DASHBOARD) ?>"><i class="far fa-fw fa-address-card"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?= route_to(ViewRoutesContract::PORTALHRD_VACANCYLIST); ?>">Vacancy</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        <!-- Page content -->

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Edit Table</h3>
                        </div>
                        <!-- Light table -->
                        <div class="table-responsive">

                            <div class="card-body">
                                <form method="POST" action="<?= route_to(ViewRoutesContract::PORTALHRD_SAVEEDITFORMVACANCY, $this->vacancy->id) ?>" enctype="multipart/form-data">
                                    <div class="form-group row">
                                        <label for="image" class="col-sm-2 col-form-label">Upload Image</label>
                                        <div class="col-sm-10">
                                            <input type="file" class="form-control-file" id="image" name="image">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="Profession" class="col-sm-2 col-form-label">Profession</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Profession" name="profession" placeholder="profesion" value="<?= $this->vacancy->profession ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Location" class="col-sm-2 col-form-label">Location</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="Location" name="location" placeholder="location" value="<?= $this->vacancy->location ?>">
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

                                    <fieldset class="form-group">
                                        <div class="row">
                                            <legend class="col-form-label col-sm-2 pt-0">Remote</legend>
                                            <div class="col-sm-10">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="remote" id="remote1" value="remote">
                                                    <label class="form-check-label" for="remote1">Remote</label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="remote" id="remote2" value="onsite">
                                                    <label class="form-check-label" for="remote2">On Site</label>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>

                                    <div class="form-group row">
                                        <label for="job_description" class="col-sm-2 col-form-label">Job Description</label>
                                        <div class="col-sm-10">
                                            <textarea type="text" class="form-control" placeholder="job description!" id="job_description"><?= $this->vacancy->jobDescriptionText?></textarea>
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
                                            <a href="<?= route_to(ViewRoutesContract::PORTALHRD_VACANCYLIST); ?>" class="btn btn-warning">Cancel</></a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>


                    </div>
                </div>
            </div>



    <?php return $this->endParsingAndGetHtml();
    }
}
