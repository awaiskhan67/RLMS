<!doctype html>
<html lang="en">

    
<!-- Mirrored from themesdesign.in/upcube/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Jul 2023 14:22:37 GMT -->
<head>
        
        <meta charset="utf-8" />
        <title>Email verify | RLMS -Rent Loan Management System</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Rent Loan system" name="description" />
        <meta content="rental Mangement" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico')}}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body class="auth-body-bg">
        <div class="bg-overlay"></div>
        <div class="wrapper-page">
            <div class="container-fluid p-0 mt-5">
                <div class="card ">
                    <div class="card-body">

                        <!-- <div class="text-center mt-4">
                            <div class="mb-3">
                                <a href="index.html" class="auth-logo">
                                    <img src="{{ asset('assets/images/logo-dark.png') }}" height="30" class="logo-dark mx-auto" alt="">
                                    <img src="{{ asset('assets/images/logo-light.png') }}" height="30" class="logo-light mx-auto" alt="">
                                </a>
                            </div>
                        </div> -->
    
                        <h3 class="text-muted text-center font-size-28"><b>EMAIL VERIFY</b></h3>

                       
    
                        <div class="p-3">
                           

                           
                            <li style="color:blue; font-size: 15px;" ><strong>Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</strong></li>
                           
                            @if (session('status') == 'verification-link-sent')
                            <li style="color:green; font-size: 15px;" ><strong>A new verification link has been sent to the email address you provided during registration.</strong></li>
                            @endif


                            <div class="mt-5 d-flex justify-between">
                                <form class="form-horizontal mt-3 flex-grow-1 mr-2" method="POST" action="{{ route('verification.send') }}">
                                    @csrf
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">{{ __('Resend Verification Email') }}</button>
                                </form>

                                <form class="form-horizontal mt-3 flex-grow-1 mr-2" method="POST" action="{{ route('logout') }}">
                                    @csrf
                                   
                                    <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">{{ __('Log Out') }}</button>
                                </form>
                            </div>

                        </div>
                        <!-- end -->
                    </div>
                    <!-- end cardbody -->
                </div>
                <!-- end card -->
            </div>
            <!-- end container -->
        </div>
        <!-- end -->

        <!-- JAVASCRIPT -->
        <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>

        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>

<!-- Mirrored from themesdesign.in/upcube/layouts/auth-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 18 Jul 2023 14:22:37 GMT -->
</html>
