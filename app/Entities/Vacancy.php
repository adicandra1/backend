<?php namespace App\Entities;

use App\Entities\VacancyDetail\Tag;
use App\Entities\VacancyDetail\VacancyRequirement;
use App\Views\PortalHRD\DataContract\VacancyDataContract;
use DateTime;

class Vacancy implements VacancyDataContract
{
    private string $id;

    private DateTime $createdDate;

    public string $role;

    public string $logoPath;

    /**
     * @var Tag[]
     */
    private array $tag;

    private VacancyRequirement $vacancyRequirement;

    private string $location;

    private string $type;

    private DateTime $endDate;

    private bool $remote;

    public function __construct(string $id, string $role, string $logoPath, string $type, DateTime $endDate, string $location, bool $remote = false)
    {
        $this->role = $role;
        $this->logoPath = $logoPath;
        $this->type = $type;
        $this->endDate = $endDate;
        $this->location = $location;
        $this->id = $id;
        $this->remote = $remote;
    }

    public function getID(): string
    {
        return $this->id;
    }

    public function getImageLogoPath(): string
    {
        return $this->logoPath;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getProfession(): string
    {
        return $this->role;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getValidDateString(): string
    {
        return $this->endDate->format("d M Y");
    }

    public function getRemoteCapability(): string
    {
        if($this->remote == true) {
            return "Ya";
        } else {
            return "Tidak";
        }
    }

    public function getRate(): string
    {
        //TODO: implement
        return "";
    }

    /**
     * @return Tag[]
     */
    public function getTags() : array
    {
        return $this->tags;
    }

    public function getGenderRequirement(): string
    {
        return $this->vacancyRequirement->getGender();
    }

    public function getDocumentsNeededName(): array
    {
        return $this->vacancyRequirement->getDocumentsNeeded();
    }

    public function getJobDescriptionText(): string
    {
        //TODO implement
        return "";
    }

    public function getAdditionalJobRequirements(): array
    {
        //TODO implement
        return array();
    }

    public function getJobDescriptionList(): array
    {
        return array();
    }

    public function getAdditionalJobDescription(): array
    {
        return array();
    }

    

    public static function withMockData() : self {
        return new self(
            "asdasf",
            "Web Dev",
            "webdev.jpg",
            "Internship",
            new DateTime(),
            "Tangerang"
        );
    }

}