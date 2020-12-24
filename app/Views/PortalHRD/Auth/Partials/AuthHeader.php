<?php

namespace App\Views\PortalHRD\Auth\Partials;

use App\Libraries\View\BaseView;
use App\Views\PortalHRD\ViewRoutesContract;

class AuthHeader extends BaseView
{
    public function render(): string
    {
        $this->startHtmlParsing(); ?>

        <!--
        =========================================================
        * Argon Dashboard - v1.2.0
        =========================================================
        * Product Page: https://www.creative-tim.com/product/argon-dashboard

        * Copyright  Creative Tim (http://www.creative-tim.com)
        * Coded by www.creative-tim.com
        =========================================================
        * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
        -->
        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
            <meta name="author" content="Creative Tim">
            <title>Login - GDPS</title>
            <!-- Favicon -->
            <link rel="icon" href="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'img/brand/favicon.png'); ?>" type="image/png">
            <!-- Fonts -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
            <!-- Icons -->
            <link rel="stylesheet" href="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'vendor/nucleo/css/nucleo.css'); ?>" type="text/css">
            <link rel="stylesheet" href="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'vendor/@fortawesome/fontawesome-free/css/all.min.css'); ?>" type="text/css">
            <!-- Argon CSS -->
            <link rel="stylesheet" href="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'css/argon.css?v=1.2.0'); ?>" type="text/css">
        </head>

        <body class="bg-default">
            <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'vendor/jquery/dist/jquery.min.js'); ?>"></script>

    <?php return $this->endParsingAndGetHtml();
    }
}
