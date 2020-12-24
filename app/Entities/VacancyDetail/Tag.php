<?php namespace App\Entities\VacancyDetail;

use App\Views\PortalHRD\DataContract\TagContract;

class Tag implements TagContract
{
    private string $id;

    private string $name;

    private string $slug;

    public function __construct(string $id, string $name, string $slug)
    {
        $this->name = $name;
        $this->id = $id;
        $this->slug = $slug;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}