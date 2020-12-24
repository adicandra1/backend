<?php namespace App\Controllers\PortalHRD;

use App\Controllers\BaseController;

class Applicants extends BaseController
{
    public function list() {
        //list all document masuk dari pelamar
        //kalau HRD pusat bisa milih dari cabang mana saja
        //kalau HRD cabang cuma list document masuk yg ada di cabang doang.
    }

    public function detail(string $id) {
        //detail document (resume dari user, KTP, dll);
    }

    /**
     * controller untuk menerima lamaran yang masuk
     */
    public function acceptApplicant(string $id) {

    }

}