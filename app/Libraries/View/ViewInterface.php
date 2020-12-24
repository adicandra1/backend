<?php namespace App\Libraries\View;

interface ViewInterface {
    /**
     * @param DataTransferObject|string|int $dto
     */
    public function render() : string;
}