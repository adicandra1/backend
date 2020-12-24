<?php

namespace App\Views\PortalHRD\Auth;

use App\Views\PortalHRD\Auth\Partials\BaseAuthView;

class Login extends BaseAuthView
{
    public function content(): string
    {
        $this->startHtmlParsing(); ?>


        
        <!-- Main content -->
        <div class="main-content">
            <!-- Header -->
            <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
                <div class="container">
                    <div class="header-body text-center mb-7">
                        <div class="row justify-content-center">
                            <div class="col-xl-5 col-lg-6 col-md-8 px-5">
                                <!-- <h1 class="text-white">welcome thesis!</h1>
              <p class="text-lead text-white">Use these awesome forms to login or create new account in your project for free.</p> -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="separator separator-bottom separator-skew zindex-100">
                    <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                        <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
                    </svg>
                </div>
            </div>
            <!-- Page content -->
            <div class="container mt--8 pb-5">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-7">
                        <div class="card bg-secondary border-0 mb-0">
                            <div class="card-header bg-transparent pb-3">
                                <div class="btn-wrapper text-center">
                                    <h1 class="text-black">welcome thesis!</h1>
                                    <p class="text-lead text-black">Use these awesome forms to login or create new account in your project for free.</p>
                                </div>
                            </div>
                            <div class="card-body px-lg-5 py-lg-5">
                                <div class="text-center text-muted mb-4">
                                    <small>Or sign in with credentials</small>
                                </div>


                                <!--?= $this->session->flashdata('message'); ?-->
                                <form role="form" method="post" action="<?= base_url('auth'); ?>">
                                    <div class="form-group mb-3">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Email" type="text" id="email" name="email" aria-describedby="emailHelp" value="">
                                        </div>
                                        <!--?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?-->
                                    </div>

                                    <div class="form-group">
                                        <div class="input-group input-group-merge input-group-alternative">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                            </div>
                                            <input class="form-control" placeholder="Password" type="password" id="password" name="password">
                                        </div>
                                        <!--?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?-->

                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-primary my-4">Sign in</button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-6">
                                <a href="#" class="text-light"><small>Forgot password?</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    <?php return $this->endParsingAndGetHtml();
    }
}
