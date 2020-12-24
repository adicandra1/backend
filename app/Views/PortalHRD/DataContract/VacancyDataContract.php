<?php namespace App\Views\PortalHRD\DataContract;

use DateTime;

class VacancyDataContract
{
    public string $id;

    public string $imageLogoPath;

    public string $profession;

    public string $location;

    public DateTime $createdDate;

    public DateTime $validDate;

    public string $type;

    public bool $remote;

    public string $rate;

    /**
     * @var TagContract[]
     */
    public $tags;

    /**
     * @return string[]
     */
    public array $documentsNeededName;

    public string $genderRequirement;

    /**
     * @var AdditionalJobRequirementContract[]
     */
    public array $additionalJobRequirements;

    public string $jobDescriptionText;

    public array $jobDescriptionList;

    /**
     * @var AdditionalJobDescriptionContract[]
     */
    public array $additionalJobDescription;

    public function __construct(string $id, string $imageLogoPath, string $profession, string $location, DateTime $createdDate, DateTime $validDate, string $type, bool $remote, string $rate, array $tags, array $documentsNeededName, string $genderRequirement, array $additionalJobRequirements, string $jobDescriptionText, array $jobDescriptionList, array $additionalJobDescription)
    {
        $this->id = $id;
        $this->imageLogoPath = $imageLogoPath;
        $this->profession = $profession;
        $this->location = $location;
        $this->createdDate = $createdDate;
        $this->validDate = $validDate;
        $this->type = $type;
        $this->remote = $remote;
        $this->rate = $rate;
        $this->tags = $tags;
        $this->documentsNeededName = $documentsNeededName;
        $this->genderRequirement = $genderRequirement;
        $this->additionalJobRequirements = $additionalJobRequirements;
        $this->jobDescriptionText = $jobDescriptionText;
        $this->jobDescriptionList = $jobDescriptionList;
        $this->additionalJobDescription = $additionalJobDescription;
        $this->imageLogoPath = $imageLogoPath;
    }

    public static function withMockData() {
        return new self(
            "1",
            "logo1.jpg",
            "Webdev",
            "Tangerang",
            new DateTime(),
            new DateTime(),
            "Job",
            true,
            "120k - 140k",
            array(
                TagContract::withMockData(),
                TagContract::withMockData()
            ),
            array(
                "KTP",
                "CV"
            ),
            "All",
            array(
                AdditionalJobRequirementContract::withMockData()
            ),
            "",
            array(
                "Building Websites",
                "Fixing Bugs",
                "Make great lead"
            ),
            array(
                AdditionalJobDescriptionContract::withMockData()
            ),
        );
    }

}