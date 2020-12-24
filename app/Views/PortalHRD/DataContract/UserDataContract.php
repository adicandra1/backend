<?php namespace App\Views\PortalHRD\DataContract;


class UserDataContract
{
    public string $name;

    public string $profileImagePath;

    public function __construct(string $name, string $profileImagePath)
    {
        $this->name = $name;
        $this->profileImagePath = $profileImagePath;
    }

    public static function withMockData() {
        return new self(
            "Azmi",
            "azmi"
        );
    }
}