<?php

namespace App\Views\PortalHRD\Auth\Partials;

use App\Libraries\View\BaseView;
use App\Views\PortalHRD\ViewRoutesContract;

class AuthFooter extends BaseView
{
    public function render(): string
    {
        $this->startHtmlParsing(); ?>

        <!-- Footer -->
        <footer class="py-5" id="footer-main">
            <div class="container">
                <div class="row align-items-center justify-content-xl-between">
                    <div class="col-xl-6">
                        <div class="copyright text-center text-xl-left text-muted">
                            &copy; 2020 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </footer>
        <!-- Argon Scripts -->
        <!-- Core -->
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER. 'vendor/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER. 'vendor/js-cookie/js.cookie.js'); ?>"></script>
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER. 'vendor/jquery.scrollbar/jquery.scrollbar.min.js'); ?>"></script>
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER. 'vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js'); ?>"></script>
        <!-- Argon JS -->
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER. 'js/argon.js?v=1.2.0'); ?>"></script>
        </body>

        </html>

    <?php return $this->endParsingAndGetHtml();
    }
}
