<?php

namespace App\Views\PortalHRD\Vacancy;

use App\Views\PortalHRD\DataContract\UserDataContract;
use App\Views\PortalHRD\DataContract\VacancyDataContract;
use App\Views\PortalHRD\Partials\BasePortalView;
use App\Views\PortalHRD\ViewRoutesContract;

class DetailVacancyView extends BasePortalView
{
    private string $title;

    private VacancyDataContract $vacancy;

    public function __construct(UserDataContract $user, VacancyDataContract $vacancy)
    {
        $this->title = "Detail Vacancy";
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
                                    <li class="breadcrumb-item"><a href="<?= route_to(ViewRoutesContract::PORTALHRD_DASHBOARD); ?>"><i class="far fa-fw fa-address-card"></i></a></li>
                                    <li class="breadcrumb-item"><a href="<?= route_to(ViewRoutesContract::PORTALHRD_VACANCYLIST); ?>">Vacancy</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Detail</li>
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
                            <h3 class="mb-0">Detail Vacancy</h3>
                        </div>

                        <div class="card-body">
                            <div class="container">

                                <ul class="job-listings mb-5">

                                    <li class="job-listing job-listing-fix d-flex align-items-center">

                                        <div class="job-listing-logo job-listing-logo-fix">
                                            <div class="image-container d-flex align-items-center justify-content-center" style="height: 150px; width: 150px;">
                                                <img src="<?= base_url($this->vacancy->imageLogoPath) ?>" alt="Logo Vacancy" class="img-fluid">
                                            </div>
                                        </div>

                                        <div class="job-listing-about job-listing-about-fix d-sm-flex justify-content-between align-items-center mx-4">
                                            <div class="job-listing-position flex-w-50 mb-3 mb-sm-0">
                                                <h2><?= $this->vacancy->profession ?></h2>
                                                <strong><?= $this->vacancy->location ?></strong> - <?= $this->vacancy->remote ?>
                                                <h5><?= $this->vacancy->type ?> • <?= $this->vacancy->rate ?> </h5>
                                            </div>
                                            <div class="job-listing-meta align-items-center mb-3 mb-sm-0">
                                                <a href="#" class="btn btn-1rem btn-primary btn-icon-text"><i class="mdi mdi-launch btn-icon-prepend"></i>Apply</a>
                                                <a href="<?= route_to(ViewRoutesContract::PORTALHRD_EDITVACANCY, $this->vacancy->id) ?>" class="btn btn-1rem btn-outline-primary">Edit</a>
                                                <button class="btn btn-sm btn-lg btn-outline-primary btn-icon-text"><i class="mdi mdi-dots-horizontal size-md"></i></button>
                                            </div>

                                        </div>

                                    </li>

                                    <li class="job-listing d-block p-3 align-items-center">

                                        <div class="row mb-3">
                                            <div class="col-6">
                                                <p><i class="mdi mdi-clock pr-2"></i>Diposting <?= $this->vacancy->createdDate->format("d M Y") ?> </p>
                                            </div>
                                            <div class="col-6 text-right">
                                                <p>Valid sampai tanggal: <?= $this->vacancy->validDate->format("d M Y") ?> </p>   
                                            </div>
                                        </div>
                                        

                                        <div class="section mb-4">
                                            <h3 class="text-header font-weight-bold">Tentang Pekerjaan ini:</h3>
                                            <p><b>Tipe</b>: <?= $this->vacancy->type?> </p>
                                            <p><b>Posisi</b>: <?= $this->vacancy->profession ?></p>
                                            <p><b>Range Gaji</b>: <?= $this->vacancy->rate ?></p>
                                            <p><b>Remote</b>: Ya</p>
                                            
                                        </div>

                                        <div class="section mb-4">
                                            <h3 class="text-header font-weight-bold">Tags</h3>

                                            <?php foreach ($this->vacancy->tags as $tag) : ?>
                                                    <a href="<?= route_to(ViewRoutesContract::PORTALHRD_VACANCYLISTWITHGETPARAMS, "tag={$tag->slug}")?>" class="badge badge-info"><?= $tag->name ?></a>
                                            <?php endforeach ?>

                                        </div>

                                        <div class="section mb-4">
                                            <h3 class="text-header font-weight-bold">Persyaratan</h3>

                                            <div class="sub-section">
                                                <h4 class="text-header font-weight-bold"> Document yang dibutuhkan </h4>

                                                <?php foreach ($this->vacancy->documentsNeededName as $docName) : ?>
                                                    <span class="badge badge-info"><?= $docName ?></span>
                                                <?php endforeach ?>
                                            </div>

                                            <div class="sub-section">
                                                <h4 class="text-header font-weight-bold">Gender</h4>
                                                <a href="#" class="badge badge-info"><?= $this->vacancy->genderRequirement ?></a>
                                            </div>

                                            <?php foreach ($this->vacancy->additionalJobRequirements as $jobRequirement) : ?>
                                                <div class="sub-section">
                                                    <h4 class="text-header font-weight-bold"> <?=$jobRequirement->title; ?></h4>
                                                    <ul>
                                                        <?php foreach ($jobRequirement->dataList as $data) : ?>
                                                            <li><?= $data ?></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            <?php endforeach ?>
                                        </div>

                                        <div class="section">
                                            <h3 class="text-header font-weight-bold">Deskripsi Pekerjaan</h3>
                                            <p><?= $this->vacancy->jobDescriptionText ?></p>

                                            <div class="sub-section">
                                                <h4 class="text-header font-weight-bold">Apa saja yang akan anda kerjakan:</h4>
                                                <ul>
                                                    <?php foreach ($this->vacancy->jobDescriptionList as $data) : ?>
                                                        <li><?= $data ?></li>
                                                    <?php endforeach ?>
                                                </ul>
                                            </div>

                                            <?php foreach ($this->vacancy->additionalJobDescription as $jobDescription) : ?>
                                                <div class="sub-section">
                                                    <h4 class="text-header font-weight-bold"> <?=$jobDescription->title; ?></h4>
                                                    <ul>
                                                        <?php foreach ($jobDescription->dataList as $data) : ?>
                                                            <li><?= $data ?></li>
                                                        <?php endforeach ?>
                                                    </ul>
                                                </div>
                                            <?php endforeach ?>

                                        </div>

                                    </li>
                                </ul>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>  

    <?php return $this->endParsingAndGetHtml();
    }
}
