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
                            <form class="row g-3" action="{{ route('forget.password.post') }}" method="POST">
                                @csrf
                                <div class="col-12 text-center mb-3">
                                    <h4 class="mb-1 fw-bold">Forgot Password? 🔒</h4>
                                    <p class="mb-4">Enter your email and we'll send you Instructions to reset your password</p>
                            
                                    @if(!empty($list))
                                        <div class="alert alert-success" role="alert">
                                        We have e-mailed your password reset link!
                                        </div>
                                    @endif
                                </div>
                                <div class="col-12 text-center mb-4">
                                    <img src="{{url('images/logo/logof2.png')}}"  alt="logof2" >
                                </div>
                                <div class="col-12">
                                    <div class="mb-2">
                                        <label class="form-label">Email address <span class="text-danger">*</span></label>
                                        <input type="email" required class="form-control form-control-lg" name="email" placeholder="name@example.com">
                                        @if($errors->has('email'))
                                            <div class="form-error text-danger">{{ $errors->first('email') }}</div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 text-center mt-4">
                                    <button type="submit" class="btn btn-lg btn-block btn-dark lift text-uppercase">Send Reset Link</button>
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