<?php

namespace App\Views\PortalHRD\Vacancy;

use App\Views\PortalHRD\DataContract\UserDataContract;
use App\Views\PortalHRD\DataContract\VacancyDataContract;
use App\Views\PortalHRD\Partials\BasePortalView;
use App\Views\PortalHRD\ViewRoutesContract;

class ListVacancyView extends BasePortalView
{

    private string $title;
    
    /**
     * @var VacancyDataContract[]
     */
    private $vacancies;

    /**
     * @param VacancyDataContract[] $vacancies
     */
    public function __construct(UserDataContract $user, $vacancies)
    {
        $this->title = "List Vacancy";
        parent::__construct($this->title, $user);
        $this->vacancies = $vacancies;
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
                                    <li class="breadcrumb-item"><a href="<?= route_to(ViewRoutesContract::PORTALHRD_DASHBOARD); ?>"><i class="far fa-fw fa-address-card"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vacancy</li>
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
                            <h3 class="mb-0">Vacancy Table</h3>
                            <div class="text-right">
                                <a href="<?= route_to(ViewRoutesContract::PORTALHRD_ADDVACANCY); ?>" class="btn btn-primary">Add Vacancy</a>
                            </div><br>
                            <!-- Light table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" style="text-align: center;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Profession</th>
                                            <th scope="col">Location</th>
                                            <th scope="col">Valid Date</th>
                                            <th scope="col">Type</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->vacancies as $index => $vacancy) { ?>

                                            <tr>
                                                <th scope="row"><?= $index + 1 ?></th>
                                                <td>
                                                    <img src="<?= base_url($vacancy->imageLogoPath); ?>" alt="">
                                                </td>
                                                <td><?= $vacancy->profession; ?></td>
                                                <td><?= $vacancy->location; ?></td>
                                                <td><?= $vacancy->validDate->format("d M Y"); ?></td>
                                                <td><?= $vacancy->type; ?></td>
                                                <td>
                                                    <a href="<?= route_to(ViewRoutesContract::PORTALHRD_EDITVACANCY, $vacancy->id); ?>" class="badge badge-success">Edit</a>
                                                    <a href="" class="badge badge-danger">Delete</a>
                                                </td>
                                            </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- Card footer -->
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">
                                                <i class="fas fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="fas fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


    <?php return $this->endParsingAndGetHtml();
    }
}
