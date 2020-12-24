<?php namespace App\Views\PortalHRD\DataContract;


class AdditionalJobDescriptionContract
{
    public string $title;

    /**
     * @var string[]
     */
    public array $dataList;

    /**
     * @param string[] $dataList
     */
    public function __construct(string $title, array $dataList)
    {
        $this->title = $title;
        $this->dataList = $dataList;
    }

    public static function withMockData() {
        return new self(
            "Benefit",
            array(
                "Great hardware",
                "weekend vacation",
                "Free snack"
            )
        );
    }

    
}