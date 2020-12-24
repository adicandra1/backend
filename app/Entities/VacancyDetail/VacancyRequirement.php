<?php namespace App\Entities\VacancyDetail;


class VacancyRequirement
{
    private string $id;

    private string $gender;

    private array $documentsNeeded;

    public function getGender() : string {
        return $this->gender;
    }

    /**
     * @return string[]
     */
    public function getDocumentsNeeded() : array {
        return $this->documentsNeeded;
    }
}