<?php

namespace App\Views\PortalHRD\Partials;

use App\Libraries\View\BaseView;
use App\Views\PortalHRD\ViewRoutesContract;

class PortalSidebar extends BaseView
{
    private string $title;

    private array $menuListSidebar;

    public function __construct(string $title)
    {
        $this->title = $title;
        $this->menuListSidebar = [
            [
                "menu_text" => 'Dashboard',
                "sub_menu" => [
                    [
                        'url' => 'dashboard',
                        'icon' => 'fa fa-chart-line',
                        'sub_menu_text' => 'Main'
                    ]
                ]
            ],
            [
                "menu_text" => 'Vacancy',
                "sub_menu" => [
                    [
                        'url' => 'vacancy',
                        'icon' => 'fa fa-list',
                        'sub_menu_text' => 'List'
                    ],
                    [
                        'url' => 'vacancy/add',
                        'icon' => 'fa fa-plus-circle',
                        'sub_menu_text' => 'Add'
                    ]
                ],
            ],
            [
                "menu_text" => 'Applicants',
                "sub_menu" => [
                    [
                        'url' => 'applicants',
                        'icon' => 'fa fa-list',
                        'sub_menu_text' => 'List'
                    ],
                ],
            ],
            [
                "menu_text" => 'User Management',
                "sub_menu" => [
                    [
                        'url' => 'users/permissions',
                        'icon' => 'fa fa-user-tag',
                        'sub_menu_text' => 'Permissions'
                    ],
                    [
                        'url' => 'users/add',
                        'icon' => 'fa fa-user-plus',
                        'sub_menu_text' => 'Add User'
                    ]
                ]
            ],
            [
                "menu_text" => 'Notification',
                "sub_menu" => [
                    [
                        'url' => 'notification',
                        'icon' => 'fa fa-list',
                        'sub_menu_text' => 'List'
                    ]
                ]
            ],
            [
                "menu_text" => 'Settings',
                "sub_menu" => [
                    [
                        'url' => 'settings/profile',
                        'icon' => 'fa fa-user-alt',
                        'sub_menu_text' => 'Profile'
                    ]
                ]
            ],

        ];
    }

    public function render(): string
    {
        $this->startHtmlParsing(); ?>

        <!-- Sidenav -->
        <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
            <div class="scrollbar-inner">
                <!-- Brand -->
                <div class="sidenav-header  align-items-center">
                    <a class="navbar-brand" href="javascript:void(0)">
                        <i class="fas fa-user-graduate fa-3x text-blue"></i>
                        <h2 class="d-inline-block mb-0 text-blue">Skripsi</h2>
                    </a>


                </div>
                <!-- <div class="navbar-inner"> -->
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">

                    <!-- Divider -->

                    <hr class="my-1">
                    <!-- Looping Menu -->

                    <?php foreach ($this->menuListSidebar as $menu) : ?>
                        <div class="navbar-heading text-muted p-3">
                            <?= $menu['menu_text']; ?>
                        </div>

                        <?php foreach ($menu['sub_menu'] as $subMenu) : ?>
                            <?php if ($this->title == $subMenu['sub_menu_text']) : ?>
                                <li class="nav-link ">
                            <?php else : ?>
                                <li class="nav-link ">
                            <?php endif; ?>


                                <a class="nav-link active" href="<?= base_url($subMenu['url']); ?>">
                                    <i class="<?= $subMenu['icon']; ?> text-blue"></i>
                                    <span class="docs-normal"><?= $subMenu['sub_menu_text']; ?></span>
                                </a>
                            </li>
                        <?php endforeach; ?>


                        <!-- Divider -->
                        <!-- <hr class="sidebar-divider mt-1"> -->
                        <hr class="my-2">

                    <?php endforeach; ?>


                    <!-- Navigation -->
                    <li class="nav-link"></li>
                    <a class="nav-link" href="<?= route_to(ViewRoutesContract::PORTALHRD_LOGOUT); ?>">
                        <i class="fas fa-fw fa-sign-out-alt text-blue"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </div>
            </div>
        </nav>

    <?php return $this->endParsingAndGetHtml();
    }
}
