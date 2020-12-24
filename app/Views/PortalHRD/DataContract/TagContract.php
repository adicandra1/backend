<?php namespace App\Views\PortalHRD\DataContract;


class TagContract
{
    public string $slug;

    public string $name;

    public function __construct(string $slug, string $name)
    {
        $this->slug = $slug;
        $this->name = $name;
    }

    public static function withMockData() {
        return new self(
            "php",
            "php"
        );
    }
}