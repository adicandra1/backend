<?php namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Entities\DataContract\Api\VacancyListApiResponse;
use App\Entities\Vacancy as EntitiesVacancy;
use App\Repository\VacancyRepository;
use App\Views\PortalHRD\DataContract\VacancyDataContract;

class Vacancy extends BaseController
{
    private VacancyRepository $vacancyRepository;

    /**
     * GET request
     * get list of vacancy
     */
    public function all(int $limit = 0) {
        $currentPage = (isset($_GET['page']) && filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT) && $_GET['page'] > 0) ? (int) $_GET['page'] : 1;
        $dataPerPage = (isset($_GET['dataPerPage']) && filter_input(INPUT_GET, 'dataPerPage', FILTER_VALIDATE_INT) && $_GET['dataPerPage'] > 0) ? (int) $_GET['dataPerPage'] : 10;

        if(isset($_GET['ids']) && is_array($_GET['ids'])) {
            //getTheSelected ID
        } else {
            //get all with the limit
        }
        $apiResponse = VacancyListApiResponse::withMockData();
        //return json_encode($apiResponse);
        $this->response->setJSON(json_encode($apiResponse))
            ->setStatusCode(200)
            ->send();
    }

    /**
     * GET request
     * get details of vacancy per vacancyID
     */
    public function detail(string $vacancyId) {
        $vacancyData = VacancyDataContract::withMockData();
        $this->response->setJSON(json_encode($vacancyData))
            ->setStatusCode(200)
            ->send();
    }

    /**
     * POST request
     * accept & validate user resume
     */
    public function apply(string $vacancyId) {
        //cek apakah pengirim valid
        //cek apakah requirement nya sudah terpenuhi
            //kalau sudah terpenuhi, save data
                //data:
                // resume view
                // experience
                // education
                // skills
                // additionalFiles
    }
}