 
 <!-- Start Header -->
 <header class="rn-header haeder-default black-logo-version header--fixed header--sticky">
    <div class="header-wrapper rn-popup-mobile-menu m--0 row align-items-center">
        <!-- Start Header Left -->
        <div class="col-lg-2 col-6">
            <div class="header-left">
                <div class="rounded-circle border shadow-sm ms-2 mt-1 mbl-logo">
                    <a href="{{url('/')}}">
                        <img src="{{url($master->logo)}}" alt="{{$master->logo}}" class="rounded-circle mbl-logo">
                    </a>
                </div>
            </div>
        </div>
        <!-- End Header Left -->
        <!-- Start Header Center -->
        <div class="col-lg-10 col-6">
            <div class="header-center">
                <nav id="sideNav" class="mainmenu-nav navbar-example2 d-none d-xl-block onepagenav">
                    <!-- Start Mainmanu Nav -->
                    <ul class="primary-menu nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="#features">Features</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#resume">Resume</a></li>
                        {{-- <li class="nav-item"><a class="nav-link" href="#pricing">Pricing</a></li> --}}
                        <li class="nav-item"><a class="nav-link" href="#contacts">Contact</a></li>
                    </ul>
                    <!-- End Mainmanu Nav -->
                </nav>
                <!-- Start Header Right  -->
                <div class="header-right">
                    <div class="hamberger-menu d-block d-xl-none">
                        <i id="menuBtn" class="feather-menu humberger-menu"></i>
                    </div>
                    <div class="close-menu d-block">
                        <span class="closeTrigger">
                        <i data-feather="x"></i>
                    </span>
                    </div>
                </div>
                <!-- End Header Right -->
            </div>
        </div>
        <!-- End Header Center -->
    </div>
</header>
<!-- End Header Area -->
<!-- Start Popup Mobile Menu  -->
<div class="popup-mobile-menu">
    <div class="inner">
        <div class="menu-top">
            <div class="menu-header" >
                <div style="width: 50px;height:50px;">
                    <a class="logo rounded-circle shadow-sm" href="{{url('/')}}" style="width: 70px;height:70px;">
                        <img src="{{url($master->logo)}}" alt="{{url($master->logo)}}" class="rounded-circle shadow-sm" style="width: 50px;height:50px;">
                    </a>
                </div>
                <div class="close-button" style="margin-top:-20px !important;">
                    <button class="close-menu-activation close"><i data-feather="x"></i></button>
                </div>
            </div>
            

        </div>
        <div class="content">
            <ul class="primary-menu nav nav-pills onepagenav">
                <li class="nav-item current"><a class="nav-link smoth-animation active" href="#home">Home</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#features">Features</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#portfolio">Portfolio</a></li>
                <li class="nav-item"><a class="nav-link smoth-animation" href="#resume">Resume</a></li>
                {{-- <li class="nav-item"><a class="nav-link smoth-animation" href="#pricing">Pricing</a></li> --}}
                <li class="nav-item"><a class="nav-link smoth-animation" href="#contacts">Contact</a></li>
            </ul>
            <!-- social sharea area -->
            <div class="social-share-style-1 mt--40">
                <span class="title">find with me</span>
                <ul class="social-share d-flex liststyle">
                    <li class="instagram">
                        <a href="{{url($master->github_link)}}" target="_blank" class="border">
                            <i class="fa-brands fa-github"></i>
                        </a>
                    </li>
                    <li class="linkedin">
                        <a href="{{url($master->linkedin_link)}}" target="_blank" class="border">
                            <i class="fa-brands fa-linkedin"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- end -->
        </div>
    </div>
</div>
<!-- End Popup Mobile Menu  -->