<?php namespace App\Controllers\PortalHRD;

use App\Controllers\BaseController;
use App\Entities\User;
use App\Libraries\View\TemplateEngine;
use App\Views\PortalHRD\DashboardView;
use App\Views\PortalHRD\DataContract\UserDataContract;

class Dashboard extends BaseController
{
    public function index() {
        return TemplateEngine::view(new DashboardView(
            UserDataContract::withMockData()
        ));
    }
}