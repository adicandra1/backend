<?php namespace App\Entities\DataContract\Api;

use App\Views\PortalHRD\DataContract\VacancyDataContract;

class VacancyListApiResponse
{
    public int $totalData;

    public int $dataPerPage;

    public int $currentPage;

    /**
     * @var VacancyDataContract[]
     */
    public array $vacancies;

    public function __construct(int $totalData, int $dataPerPage, int $currentPage, array $vacancies)
    {
        $this->totalData = $totalData;
        $this->dataPerPage = $dataPerPage;
        $this->currentPage = $currentPage;
        $this->vacancies = $vacancies;
    }

    public static function withMockData() : self {
        return new self(
            34,
            7,
            2,
            array(
                VacancyDataContract::withMockData(),
                VacancyDataContract::withMockData(),
                VacancyDataContract::withMockData(),
                VacancyDataContract::withMockData(),
                VacancyDataContract::withMockData(),
                VacancyDataContract::withMockData(),
                VacancyDataContract::withMockData()
            )
        );
    }
}