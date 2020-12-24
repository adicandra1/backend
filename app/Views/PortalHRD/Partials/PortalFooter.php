<?php

namespace App\Views\PortalHRD\Partials;

use App\Libraries\View\BaseView;
use App\Views\PortalHRD\ViewRoutesContract;

class PortalFooter extends BaseView
{
    public function render(): string
    {
        $this->startHtmlParsing(); ?>

        <!-- Footer -->
        <footer class="footer pt-0">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6">
                    <div class="copyright text-center  text-lg-left  text-muted">
                        &copy; <?= date('M Y'); ?><a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Website Skripsi Azmi</a>
                    </div>
                </div>

            </div>
        </footer>
        </div>
        </div>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                    </div>
                </div>
            </div>
        </div>



        <!-- Argon Scripts -->
        <!-- Core -->

        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'vendor/bootstrap/dist/js/bootstrap.bundle.min.js'); ?>"></script>
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'vendor/js-cookie/js.cookie.js'); ?>"></script>
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'vendor/jquery.scrollbar/jquery.scrollbar.min.js'); ?>"></script>
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js'); ?>"></script>
        <!-- Optional JS -->
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'vendor/chart.js/dist/Chart.min.js'); ?>"></script>
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'vendor/chart.js/dist/Chart.extension.js'); ?>"></script>
        <!-- Argon JS -->
        <script src="<?= base_url(ViewRoutesContract::PORTALHRD_ASSETS_FOLDER . 'js/argon.js?v=1.2.0'); ?>"></script>


        <script>
            $('.custom-file-input').on('change', function() {
                let fileName = $(this).val().split('\\').pop();
                $(this).next('.custom-file-label').addClass("selected").html(fileName);

            });
        </script>

        </body>

        </html>

<?php return $this->endParsingAndGetHtml();
    }
}
