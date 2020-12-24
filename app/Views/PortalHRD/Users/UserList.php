<?php namespace App\Views\PortalHRD\Users;

use App\Libraries\View\TemplateEngine;
use App\Views\PortalHRD\Partials\BasePortalView;
use App\Views\PortalHRD\Users\Partials\FormAddUser;
use App\Views\PortalHRD\ViewRoutesContract;

class UserList extends BasePortalView
{
    public function content(): string
    {
        $this->startHtmlParsing(); ?>
        
            <!-- Header -->
        <div class="header bg-primary pb-6">
            <div class="container-fluid">
                <div class="header-body">
                    <div class="row align-items-center py-4">
                        <div class="col-lg-6 col-7">
                            <h6 class="h1 text-white d-inline-block mb-0"><?= $this->title; ?></h6>
                            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                                    <li class="breadcrumb-item"><a href="<?= route_to(ViewRoutesContract::PORTALHRD_DASHBOARD); ?>"><i class="far fa-fw fa-address-card"></i></a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Vacancy</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page content -->

        <div class="container-fluid mt--6">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <!-- Card header -->
                        <div class="card-header border-0">
                            <h3 class="mb-0">Vacancy Table</h3>
                            <div class="text-right">
                                <a href="<?= route_to(ViewRoutesContract::PORTALHRD_ADDVACANCY); ?>" class="btn btn-primary">Add Vacancy</a>
                            </div><br>
                            <!-- Light table -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" style="text-align: center;">
                                    <thead class="thead-light">
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Assigned Group</th>
                                            <th scope="col">Assigned Permissions</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                    </tbody>
                                </table>

                            </div>
                            <!-- Card footer -->
                            <div class="card-footer py-4">
                                <nav aria-label="...">
                                    <ul class="pagination justify-content-end mb-0">
                                        <li class="page-item disabled">
                                            <a class="page-link" href="#" tabindex="-1">
                                                <i class="fas fa-angle-left"></i>
                                                <span class="sr-only">Previous</span>
                                            </a>
                                        </li>
                                        <li class="page-item active">
                                            <a class="page-link" href="#">1</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="fas fa-angle-right"></i>
                                                <span class="sr-only">Next</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="formAddModal" class="modal fade" tabindex="-1" role="dialog">
                <style>
                    .form-check-input.fix {
                        margin-left: 0rem !important;
                    }
                </style>
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add User</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            
                            <?= TemplateEngine::view(new FormAddUser()) ?>
                            
                        </div>
                        <div class="modal-footer">
                            <label for="submit-form" tabindex="0">Submit</label>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                    
                </div>
            </div>


            <script>
                document.addEventListener('DOMContentLoaded', function(e) {
                    $('#formAddModal').modal('show');
                }) 
            </script>
        
        <?php return $this->endParsingAndGetHtml();
    }
}