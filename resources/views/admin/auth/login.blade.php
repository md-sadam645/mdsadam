<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: {{$title}} ::</title>
    <link rel="icon" href="{{url('images/logo/favicon.png')}}" type="image/x-icon">

    <!-- project css file  -->
    <link rel="stylesheet" href="{{url('assets/backend/css/luno.style.min.css')}}">
</head>

<body id="layout-1" data-luno="theme-blue">

    <!-- start: body area -->
    <div class="wrapper">
        
        <!-- start: page body -->
        <div class="page-body auth px-xl-4 px-sm-2 px-0 py-lg-2 py-1">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 d-none d-lg-flex justify-content-center align-items-center">
                        
                    </div>
                    <div class="col-lg-6 d-flex justify-content-center align-items-center">
                        <div class="card shadow-sm w-100 p-4 p-md-5" style="max-width: 32rem;">
                            <!-- Form -->
                            <form class="row g-3" action="adminAuth" method="post">
                                @csrf
                                <div class="col-12 text-center mb-3">
                                    <h1>Sign in</h1>
                                    <span class="text-muted">Login to the Admin Dashboard</span>
                                </div>
                                <div class="col-12 text-center mb-4">
                                    <img src="{{url('images/logo/logof2.png')}}"  alt="logof2" >
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address <span class="text-danger">*</span></label>
                                        <input type="email" required class="form-control form-control-lg" name="email" placeholder="name@example.com">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <div class="form-label">
                                            <span class="d-flex justify-content-between align-items-center">
                                                <label class="form-label">Password <span class="text-danger">*</span></label>
                                                <a class="text-primary" href="{{url('forget-password')}}">Forgot Password?</a>
                                            </span>
                                        </div>
                                        <div class="input-group">
                                            <input type="password" class="form-control pass-field pass-new-confirm form-control-lg" name="password" placeholder="***************" autocomplete="off" minlength="6" required />
                                            <span id="basic-default-password2" class="input-group-text" style="cursor:pointer;">
                                                <i class="fa fa-eye-slash" style="font-size: 20px;" id="show-pass"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase" href="" title="">SIGN IN</button>
                                </div>
                            </form>
                            <!-- End Form -->
                        </div>
                    </div>
                    <div class="col-lg-3 d-none d-lg-flex justify-content-center align-items-center">
                        
                    </div>
                </div>
                <!-- End Row -->

            </div>
        </div>

    </div>

<!-- Jquery Core Js -->
<script src="{{url('assets/backend/bundles/libscripts.bundle.js')}}"></script>
<!-- pass validation Core Js -->
<script src="{{url('assets/backend/js/passwordValidation.js')}}"></script>
<!-- Jquery Page Js -->

</body>
</html>