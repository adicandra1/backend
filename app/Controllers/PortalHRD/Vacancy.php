<?php namespace App\Controllers\PortalHRD;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Entities\Vacancy as EntitiesVacancy;
use App\Libraries\View\TemplateEngine;
use App\Views\PortalHRD\DataContract\UserDataContract;
use App\Views\PortalHRD\DataContract\VacancyDataContract;
use App\Views\PortalHRD\Vacancy\AddVacancyView;
use App\Views\PortalHRD\Vacancy\DetailVacancyView;
use App\Views\PortalHRD\Vacancy\EditVacancyView;
use App\Views\PortalHRD\Vacancy\ListVacancyView;

class Vacancy extends BaseController
{
    /**
     * Vacancy list yg telah dibuat oleh HRD
     * bagi HRD Pusat juga ada list vacancy masuk dari HRD Cabang yg belum dikonfirmasi, juga ada history vacancy masuk yg sudah terkonfirmasi.
     * bagi HRD Cabang juga ada list vacancy yg disubmit yg belum di konfirmasi oleh HRD Pusat, beserta statusnya, juga ada history vacancy yang pernah di submit.
     */
    public function list() {
        return TemplateEngine::view(new ListVacancyView(
            UserDataContract::withMockData(),
            array(
                VacancyDataContract::withMockData(),
                VacancyDataContract::withMockData(),
                VacancyDataContract::withMockData()
            )
        ));
    }

    /**
     * controller for accept proposal vacancy yang diajukan HRD cabang,
     * tersedia hanya untuk HRD Pusat
     * 
     * Dan ada form tambahan untuk langkah selanjutnya
     */
    public function acceptVacancyProposal(string $id) {

    }

    /**
     * untuk melihat detail vacancy.
     */
    public function detail(string $id) {
        return TemplateEngine::view(new DetailVacancyView(
            UserDataContract::withMockData(),
            VacancyDataContract::withMockData()
        ));
    }

    public function edit(string $id) {
        return TemplateEngine::view(new EditVacancyView(
            UserDataContract::withMockData(),
            VacancyDataContract::withMockData()
        ));
    }

    /**
     * POST request for saving Edited Form
     */
    public function saveEditForm() {
        //if the user is HRD Cabang, status vacancy masih pending dan kirim notifikasi ke HRD Pusat.
    }

    public function add() {
        return TemplateEngine::view(new AddVacancyView(
            UserDataContract::withMockData()
        ));
    }

    /**
     * POST request for saving form in add Vacancy view.
     */
    public function saveFormAdd() {
        //if user == HRD Cabang, then notify HRD pusat for persetujuan 
    }

    /**
     * POST request to delete vacancy data
     */
    public function delete(string $id) {
        //notify user yg sudah melamar posisi ini dan masih menunggu keputusan = {I'm sorry posisi yg anda lamar sudah ditutup.}
    }
}