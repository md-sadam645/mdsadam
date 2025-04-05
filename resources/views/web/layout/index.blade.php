<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$title}}</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="mdsadam md sadam mohammad sadam rain">
    <meta name="keywords" content="#mdsadam #md #sadam #mohammad #sadam #rain #saddam #mohammed #sadamportfolio #sadamwebsite">
    <meta name="author" content="mdsadam.world">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{$master->favicon}}">
    <!-- CSS -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/vendor/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/vendor/slick.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/vendor/slick-theme.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/vendor/aos.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/plugins/feature.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Style css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/css/style.css')}}">
    <style>
        .carousel-control-prev-icon,.carousel-control-next-icon{
            width:50px;
            height:50px;
            color: white;
            display: flex;
            justify-content:center;
            align-items: center;
            border-radius: 50%;
            background:#1D1D27;
        }

        .carousel-indicators [data-bs-target]{
            /* margin-top:-80px; */
            width: 20px !important;
            height: 20px !important;
            border-radius: 50% !important;
            background-color: #454748 !important;
        }

        .carousel-indicators .active
        {
            background-color: #FF014F !important;
        }

        .mbl-logo{
            width: 70px;
            height:70px;
        }

        /* .rn-portfolio-slick .portfolio-con .slick-slide{
            width:300px !important;
        } */

        @media(max-width: 767px)
        {
            .carousel-control-prev-icon,.carousel-control-next-icon
            {
                display: none !important;
            }

            .mbl-logo{
                width: 50px;
                height:50px;
            }
        }
        
        @media(min-width: 768px) and (max-width:1000px)
        {
            .slide-width
            {
                width:350px !important;
            }
        }
    </style>
</head>

<body class="template-color-1 spybody" data-spy="scroll" data-target=".navbar-example2" data-offset="70">
@include('web.layout.header')
<main class="main-page-wrapper">

<!-- Start Slider Area -->
<div id="home" class="rn-slider-area">
    <div class="slide slider-style-1">
        <div class="container">
            <div class="row row--30 align-items-center">
                @if(!empty($slider))
                    <div class="order-2 order-lg-1 col-lg-7 mt_md--50 mt_sm--50 mt_lg--30">
                        @php 
                            $allSkill = json_decode($slider->skill);
                            $allDsig = json_decode($slider->designation);
                        @endphp
                        <div class="content">
                            <div class="inner">
                                <span class="subtitle">{{$slider->tagline}}</span>
                                <h1 class="title">Hi, I’m <span class="text-capitalize">{{$slider->name}}</span><br>
                                    <span class="header-caption" id="page-top">
                                        <!-- type headline start-->
                                        <span class="cd-headline clip is-full-width">
                                            <span>a </span>
                                    <!-- ROTATING TEXT -->
                                    <span class="cd-words-wrapper">
                                        <b class="is-visible text-capitalize">{{$allDsig[0]}}   .</b>
                                        @if(count($allDsig) > 1)
                                            @for($i = 1; $i < count($allDsig) ; $i++)
                                                <b class="is-hidden text-capitalize">{{$allDsig[$i]}}.</b>
                                            @endfor
                                        @endif
                                    </span>
                                    </span>
                                    <!-- type headline end -->
                                    </span>
                                </h1>

                                <div>
                                    <p class="description">{{$slider->description}}</p>
                                </div>
                            </div>
                            <div class="row">
                                
                                <div class="col-md-12 mt_mobile--30">
                                    <div class="skill-share-inner">
                                        <span class="title">best skill on</span>
                                        <ul class="skill-share d-flex liststyle">
                                            @for($i = 0; $i < count($allSkill) ; $i++)
                                                <li class="border d-flex justify-content-center align-items-center">
                                                    <i class="{{$allSkill[$i]}}" id="skill-icon"></i>
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-5 col-md-6">
                                    <div class="social-share-inner-left">
                                        <a href="{{$master->resume}}" download class="rn-btn thumbs-icon border">
                                            Download Resume
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="order-1 order-lg-2 col-lg-5">
                        <div class="thumbnail">
                            <div class="inner">
                                <img src="{{url($slider->image)}}" alt="Personal Portfolio Images">
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End Slider Area -->

<!-- Start Service Area -->
<div class="rn-service-area rn-section-gap section-separator" id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-left" data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true">
                    <span class="subtitle">Features</span>
                    <h2 class="title">What I Do</h2>
                </div>
            </div>
        </div>
        <div class="row row--25 mt_md--10 mt_sm--10">
            <!-- Start Single Service -->
            @foreach ($feature as $featureData)
                <div data-aos="fade-up" data-aos-duration="500" data-aos-delay="100" data-aos-once="true" class="col-lg-6 col-xl-4 col-md-6 col-sm-12 col-12 mt--50 mt_md--30 mt_sm--30">
                    <div class="rn-service">
                        <div class="inner">
                            <div class="icon">
                                <i class="{{$featureData->icon}}" style="font-size: 45px;color:#DC0649;"></i>
                            </div>
                            <div class="content">
                                <h4 class="title text-capitalize"><a href="javascript:void(0)">{{$featureData->title}}</a></h4>
                                <p class="description">{{$featureData->description}}</p>
                                    <a class="read-more-button" href="javascript:void()"><i class="feather-arrow-right"></i></a>
                                </div>
                            </div>
                            <a class="over-link" href="javascript:void(0)   "></a>
                        </div>
                </div>
            @endforeach
            <!-- End SIngle Service -->
        </div>
    </div>
</div>
<!-- End Service Area  -->


<!-- Start Portfolio Area -->
<div id="portfolio" class="rn-portfolio-area portfolio-style-three rn-section-gap section-separator">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200" data-aos-once="true" class="section-title text-center">
                    <span class="subtitle">{{$master->portfolio_quote}}</span>
                    <h2 class="title">My Portfolio</h2>
                </div>
            </div>
        </div>
        
        <div class="row mt--50">

            <div class="col-lg-12 slider-con">
                <h6 class="title mb-0 pb-0">MERN</h6>
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500" data-aos-once="true" class="portfolio-wrapper portfolio-slick-activation slick-arrow-style-one rn-slick-dot-style">
                    <!-- Start Single Portfolio  -->
                    @foreach ($mern as $mernData)
                    <div class="rn-portfolio-slick portfolio-con slide-width" contentid="{{$mernData->id}}">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="{{url($mernData->profile)}}" alt="{{$mernData->profile}}">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">{{$mernData->category}}</a>
                                        </div>
                                        {{-- <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="fa-solid fa-clock"></i></a>
                                                @php echo date_format($mernData->created_at,"Y-M-d") @endphp
                                            </span>
                                        </div> --}}
                                    </div>
                                    <h4 class="title text-capitalize">
                                        <a href="javascript:void(0)">{{$mernData->pname}}
                                            <i class="feather-arrow-up-right"></i>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-12 slider-con">
                <h6 class="title mb-0 pb-0">React Native</h6>
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500" data-aos-once="true" class="portfolio-wrapper portfolio-slick-activation slick-arrow-style-one rn-slick-dot-style">
                    <!-- Start Single Portfolio  -->
                    @foreach ($reactNative as $reactN)
                    <div class="rn-portfolio-slick portfolio-con slide-width" contentid="{{$reactN->id}}">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="{{url($reactN->profile)}}" alt="{{$reactN->profile}}">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">{{$reactN->category}}</a>
                                        </div>
                                        {{-- <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="fa-solid fa-clock"></i></a>
                                                @php echo date_format($reactN->created_at,"Y-M-d") @endphp
                                            </span>
                                        </div> --}}
                                    </div>
                                    <h4 class="title text-capitalize">
                                        <a href="javascript:void(0)">{{$reactN->pname}}
                                            <i class="feather-arrow-up-right"></i>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>

            <div class="col-lg-12 slider-con">
                <h6 class="title mb-0 pb-0">Laravel</h6>
                <div data-aos="fade-up" data-aos-duration="1000" data-aos-delay="500" data-aos-once="true" class="portfolio-wrapper portfolio-slick-activation slick-arrow-style-one rn-slick-dot-style">
                    <!-- Start Single Portfolio  -->
                    @foreach ($laravel as $lData)
                    <div class="rn-portfolio-slick portfolio-con slide-width" contentid="{{$lData->id}}">
                        <div class="rn-portfolio" data-bs-toggle="modal" data-bs-target="#portfolioModal">
                            <div class="inner">
                                <div class="thumbnail">
                                    <a href="javascript:void(0)">
                                        <img src="{{url($lData->profile)}}" alt="{{$lData->profile}}">
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="category-info">
                                        <div class="category-list">
                                            <a href="javascript:void(0)">{{$lData->category}}</a>
                                        </div>
                                        {{-- <div class="meta">
                                            <span><a href="javascript:void(0)"><i class="fa-solid fa-clock"></i></a>
                                                @php echo date_format($lData->created_at,"Y-M-d") @endphp
                                            </span>
                                        </div> --}}
                                    </div>
                                    <h4 class="title text-capitalize">
                                        <a href="javascript:void(0)">{{$lData->pname}}
                                            <i class="feather-arrow-up-right"></i>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End portfolio Area -->

<!-- Start Resume Area -->
<div class="rn-resume-area rn-section-gap section-separator" id="resume">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle">{{$master->experience}}</span>
                    <h2 class="title">My Resume</h2>
                </div>
            </div>
        </div>
        <div class="row mt--45">
            <div class="col-lg-12">
                <ul class="rn-nav-list nav nav-tabs" id="myTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="education-tab" data-bs-toggle="tab" href="#education" role="tab" aria-controls="education" aria-selected="true">education</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="professional-tab" data-bs-toggle="tab" href="#professional" role="tab" aria-controls="professional" aria-selected="false">professional
                            Skills</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="experience-tab" data-bs-toggle="tab" href="#experience" role="tab" aria-controls="experience" aria-selected="false">experience</a>
                    </li>
                </ul>

                <!-- Start Tab Content Wrapper  -->
                <div class="rn-nav-content tab-content" id="myTabContents">
                    <!-- Start Single Tab  -->
                    <div class="tab-pane show active fade single-tab-area" id="education" role="tabpanel" aria-labelledby="education-tab">
                        <div class="personal-experience-inner mt--40">
                            <div class="row">
                                <!-- Start Skill List Area  -->
                                <div class="col-lg-8 col-md-12 col-12">
                                    <div class="content">
                                        {{-- <span class="subtitle">2007 - 2010</span> --}}
                                        <h4 class="maintitle">Education Quality</h4>
                                        <div class="experience-list">

                                            <!-- Start Single List  -->
                                            @foreach ($education as $educationData)
                                                <div class="resume-single-list">
                                                    <div class="inner">
                                                        <div class="heading">
                                                            <div class="title">
                                                                <h4 class="text-capitalize">{{$educationData->course_name}}</h4>
                                                                <span class="text-capitalize">{{$educationData->organization_name}} ({{$educationData->duration}})</span>
                                                            </div>
                                                            <div class="date-of-time">
                                                                <span>{{$educationData->grade}}</span>
                                                            </div>
                                                        </div>
                                                        <p class="description">{{$educationData->description}}</p>
                                                        </div>
                                                    </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <!-- End Skill List Area  -->
                            </div>
                        </div>
                    </div>
                    <!-- End Single Tab  -->

                    <!-- Start Single Tab  -->
                    <div class="tab-pane fade " id="professional" role="tabpanel" aria-labelledby="professional-tab">
                        <div class="personal-experience-inner mt--40">
                            <div class="row row--40">
                                <!-- Start Single Progressbar  -->
                                <div class="col-12 mt_sm--60">
                                    <div class="progress-wrapper">
                                        <div class="content">
                                            <span class="subtitle">Features</span>
                                            <h4 class="maintitle">Development Skill</h4>
                                            <!-- Start Single Progress Charts -->
                                        
                                            <div class="row">
                                                    @foreach ($development as $developmentData)
                                                    <div class="col-6 col-lg-3 ps-3 ps-md-0 pe-3 pe-lg-5 mx-0 mb-lg-5 mb-4">
                                                        <div class="border p-3 d-flex align-items-center" style="border-radius:4px;">
                                                            <img src="{{url($developmentData->image)}}" width="35" height="35" style="border-radius:4px;" /> &nbsp;
                                                            <p class="mb-0" style="font-size:18px;">{{$developmentData->name}}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                    @foreach ($other as $otherData)
                                                    <div class="col-6 col-lg-3 ps-3 ps-md-0 pe-3 pe-lg-5 mx-0 mb-lg-5 mb-4">
                                                        <div class="border p-3 d-flex align-items-center" style="border-radius:4px;">
                                                            <img src="{{url($otherData->image)}}" width="35" height="35" style="border-radius:4px;" /> &nbsp;
                                                            <p class="mb-0" style="font-size:18px;">{{$otherData->name}}</p>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            <!-- End Single Progress Charts -->
                                        </div>
                                    </div>
                                </div>
                                <!-- End Single Progressbar  -->
                       
                            </div>
                        </div>
                    </div>
                    <!-- End Single Tab  -->

                    <!-- Start Single Tab  -->
                    <div class="tab-pane fade" id="experience" role="tabpanel" aria-labelledby="experience-tab">
                        <div class="personal-experience-inner mt--40">
                            <div class="row">
                                <!-- Start Skill List Area  -->
                                {{-- <div class="col-lg-6 col-md-12 col-12">
                                    <div class="content">
                                        <span class="subtitle">2007 - 2010</span>
                                        <h4 class="maintitle">Education Quality</h4>
                                        <div class="experience-list">

                                            <!-- Start Single List  -->
                                            <div class="resume-single-list">
                                                <div class="inner">
                                                    <div class="heading">
                                                        <div class="title">
                                                            <h4>Personal Portfolio April Fools</h4>
                                                            <span>University of DVI (1997 - 2001)</span>
                                                        </div>
                                                        <div class="date-of-time">
                                                            <span>4.30/5</span>
                                                        </div>
                                                    </div>
                                                    <p class="description">The education should be very
                                                        interactual. Ut tincidunt est ac dolor aliquam sodales.
                                                        Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                        mauris hendrerit ante.</p>
                                                </div>
                                            </div>
                                            <!-- End Single List  -->

                                            <!-- Start Single List  -->
                                            <div class="resume-single-list">
                                                <div class="inner">
                                                    <div class="heading">
                                                        <div class="title">
                                                            <h4> Examples Of Personal Portfolio</h4>
                                                            <span>College of Studies (2000 - 2002)</span>
                                                        </div>
                                                        <div class="date-of-time">
                                                            <span>4.50/5</span>
                                                        </div>
                                                    </div>
                                                    <p class="description">Maecenas finibus nec sem ut
                                                        imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                        Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                        mauris hendrerit ante.</p>
                                                </div>
                                            </div>
                                            <!-- End Single List  -->

                                            <!-- Start Single List  -->
                                            <div class="resume-single-list">
                                                <div class="inner">
                                                    <div class="heading">
                                                        <div class="title">
                                                            <h4>Tips For Personal Portfolio</h4>
                                                            <span>University of Studies (1997 - 2001)</span>
                                                        </div>
                                                        <div class="date-of-time">
                                                            <span>4.80/5</span>
                                                        </div>
                                                    </div>
                                                    <p class="description"> If you are going to use a passage.
                                                        Ut tincidunt est ac dolor aliquam sodales.
                                                        Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                        mauris hendrerit ante.</p>
                                                </div>
                                            </div>
                                            <!-- End Single List  -->

                                        </div>
                                    </div>
                                </div> --}}
                                <!-- End Skill List Area  -->

                                <!-- Start Skill List Area 2nd  -->
                                <div class="col-lg-8 col-md-12 col-12 mt_md--60 mt_sm--60">
                                    <div class="content">
                                        {{-- <span class="subtitle">2007 - 2010</span> --}}
                                        <h4 class="maintitle">Job Experience</h4>
                                        <div class="experience-list">

                                            <!-- Start Single List  -->
                                            @foreach($experience as $experienceData)
                                          
                                            <div class="resume-single-list">
                                                <div class="inner">
                                                    <div class="heading">
                                                        <div class="title">
                                                            <h4 class="text-capitalize">{{$experienceData->designation}}</h4>
                                                            <span class="text-capitalize">{{$experienceData->company_name}}, {{$experienceData->location}}</span>
                                                            <span class="text-capitalize">{{$experienceData->duration}}</span>
                                                        </div>
                                                        {{-- <div class="date-of-time">
                                                            <span>4.70/5</span>
                                                        </div> --}}
                                                    </div>
                                                    <p class="description">{{$experienceData->description}}</p>
                                                </div>
                                            </div>
                                            @endforeach
                                            <!-- End Single List  -->

                                            {{-- <!-- Start Single List  -->
                                            <div class="resume-single-list">
                                                <div class="inner">
                                                    <div class="heading">
                                                        <div class="title">
                                                            <h4>The Personal Portfolio Mystery</h4>
                                                            <span>Job at Rainbow-Themes (2008 - 2016)</span>
                                                        </div>
                                                        <div class="date-of-time">
                                                            <span>4.95/5</span>
                                                        </div>
                                                    </div>
                                                    <p class="description">Generate Lorem Ipsum which looks. Ut
                                                        tincidunt est ac dolor aliquam sodales.
                                                        Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                        mauris hendrerit ante.</p>
                                                </div>
                                            </div>
                                            <!-- End Single List  -->

                                            <!-- Start Single List  -->
                                            <div class="resume-single-list">
                                                <div class="inner">
                                                    <div class="heading">
                                                        <div class="title">
                                                            <h4>Diploma in Computer Science</h4>
                                                            <span>Works at Plugin Development (2016 -
                                                        2020)</span>
                                                        </div>
                                                        <div class="date-of-time">
                                                            <span>5.00/5</span>
                                                        </div>
                                                    </div>
                                                    <p class="description">Maecenas finibus nec sem ut
                                                        imperdiet. Ut tincidunt est ac dolor aliquam sodales.
                                                        Phasellus sed mauris hendrerit, laoreet sem in, lobortis
                                                        mauris hendrerit ante.</p>
                                                </div>
                                            </div>
                                            <!-- End Single List  --> --}}

                                        </div>
                                    </div>
                                </div>
                                <!-- End Skill List Area  -->
                            </div>
                        </div>
                    </div>
                    <!-- End Single Tab  -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Resume Area -->

<!-- Pricing Area -->
{{-- @if($master->pricing_status == 1)
<div class="rn-pricing-area rn-section-gap section-separator" id="pricing">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-5 mb_md--40 mb_sm--40 small-margin-pricing">
                <div class="d-block d-lg-flex text-center d-lg-left section-flex flex-wrap align-content-start h-100">
                    <div class="position-sticky sticky-top rbt-sticky-top-adjust">
                        <div class="section-title text-left">
                            <span class="subtitle text-center text-lg-left">Pricing</span>
                            <h2 class="title text-center text-lg-left">My Pricing</h2>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8 col-xl-7">
                <!-- Pricing Area -->
                <div class="navigation-wrapper">
                    <ul class="nav" id="myTab" role="tablist">
                        @foreach($pricing as $pricingTab)
                            
                        <li class="nav-item {{$pricingTab->recommended }}">
                            <a class="nav-style text-capitalize @if($pricingTab->recommended != "") active @endif" id="{{$pricingTab->plan}}-tab" data-bs-toggle="tab" href="#{{$pricingTab->plan}}" role="tab" aria-controls="{{$pricingTab->plan}}" aria-selected="false">{{$pricingTab->plan}}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        @foreach($pricing as $pricingData)
                        <div class="tab-pane fade @if($pricingData->recommended != "") show active @endif" id="{{$pricingData->plan}}" role="tabpanel" aria-labelledby="{{$pricingData->plan}}-tab">
                            <!-- Pricing Start -->
                            <div class="rn-pricing">
                                <div class="pricing-header">
                                    <div class="header-left">
                                        <h2 class="title text-capitalize">{{$pricingData->title}}</h2>
                                        <span class="text-capitalize">{{$pricingData->subtitle}}</span>
                                    </div>
                                    <div class="header-right border">
                                        <span><i class="fa fa-inr"></i> @php echo number_format($pricingData->price); @endphp</span>
                                    </div>
                                </div>
                                <div class="pricing-body">
                                    <p class="description text-capitalize">
                                        {{$pricingData->description}}
                                    </p>
                                    <div class="check-wrapper">
                                        @php
                                           $sLeft = json_decode($pricingData->serviceOne);
                                           $sRight = json_decode($pricingData->serviceTwo);
                                        @endphp
                                        <div class="left-area">
                                            @foreach($sLeft as $sLeftData)
                                                
                                            <div class="check d-flex">
                                                <i data-feather="check"></i>
                                                <p class="text-capitalize">{{$sLeftData}}</p>
                                            </div>
                                            @endforeach
                                        </div>
                                        <div class="right-area">
                                            @foreach($sRight as $sRightData)
                                            <div class="check d-flex">
                                                <i data-feather="check"></i>
                                                <p class="text-capitalize">{{$sRightData}}</p>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class="pricing-footer">
                                    <a href="#contacts" class="rn-btn d-block">
                                        <span>ORDER NOW</span>
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- End -->
                        </div>
                        @endforeach
                       
                    </div>
                </div>
                <!-- End -->
            </div>
        </div>
    </div>
</div>
@endif --}}
<!-- pricing area -->

 <!-- Start Contact section -->
 <div class="rn-contact-area rn-section-gap section-separator" id="contacts">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title text-center">
                    <span class="subtitle">Contact</span>
                    <h2 class="title">Contact With Me</h2>
                </div>
            </div>
        </div>

        <div class="row mt--50 mt_md--40 mt_sm--40 mt-contact-sm">
            <div class="col-lg-5">
                <div class="contact-about-area">
                    <div class="thumbnail">
                        <img src="{{url($contactDetails->image)}}" alt="contact-img">
                    </div>
                    <div class="title-area">
                        <h4 class="title text-capitalize">{{$contactDetails->title}}</h4>
                        <span class="text-capitalize">{{$contactDetails->subtitle}}</span>
                    </div>
                    <div class="description">
                        <p>
                            {{$contactDetails->description}}
                        </p>
                        <span class="phone">Phone: <a href="tel:{{$contactDetails->mobile}}">+91 {{$contactDetails->mobile}}</a></span>
                        <span class="mail">Email: <a href="mailto:{{$contactDetails->email}}">{{$contactDetails->email}}</a></span>
                    </div>
                    <div class="social-area">
                        <div class="name">FIND WITH ME</div>
                        <div class="social-icone">
                            <a href="{{$master->github_link}}" target="_blank" class="border"><i class="fa-brands fa-github"></i></a>
                            <a href="{{$master->linkedin_link}}" target="_blank" class="border"><i class="fa-brands fa-linkedin"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div data-aos-delay="600" class="col-lg-7 contact-input">
                <div class="contact-form-wrapper">
                    <div class="introduce">

                        <form class=" row" method="POST" action="{{url('contactUs')}}">
                            @csrf
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Your Name<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-lg" name="name" id="name" type="text" required>
                                    @if($errors->has('name'))
                                        <div class="form-error text-danger">{{ $errors->first('name') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="mobile">Mobile<span class="text-danger">*</span></label>
                                    <input class="form-control" name="mobile" id="mobile" type="number" required >
                                    @if($errors->has('mobile'))
                                    <div class="form-error text-danger">{{ $errors->first('mobile') }}</div>
                                @endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="email">Email<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-sm" id="email" name="email" type="email" required>
                                    @if($errors->has('email'))
                                        <div class="form-error text-danger">{{ $errors->first('email') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="subject">subject<span class="text-danger">*</span></label>
                                    <input class="form-control form-control-sm" id="subject" name="subject" type="text" required>
                                    @if($errors->has('subject'))
                                        <div class="form-error text-danger">{{ $errors->first('subject') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label for="message">Your Message<span class="text-danger">*</span></label>
                                    <textarea name="message" id="message" cols="30" rows="10" required></textarea>
                                    @if($errors->has('message'))
                                        <div class="form-error text-danger">{{ $errors->first('message') }}</div>
                                    @endif
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" class="rn-btn">
                                    <span>SEND MESSAGE</span>
                                    <i data-feather="arrow-right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Contuct section -->


<!-- Modal Blog Body area Start -->
<div class="modal fade" id="portfolioModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-news" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i data-feather="x"></i></span>
                </button>
            </div>

            <div class="modal-body">
                {{-- <img src="assets/images/blog/blog-big-01.jpg" alt="news modal" class="img-fluid modal-feat-img"> --}}
                <div id="portfolioCarouselControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner" id="slider-img">
                      
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#portfolioCarouselControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon text-white" aria-hidden="true">
                        <i class="fa-solid fa-arrow-left"></i>
                      </span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#portfolioCarouselControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true">
                        <i class="fa-solid fa-arrow-right"></i>
                      </span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
                <div class="news-details">
                    <div class="button-group mt--20">
                        <a href="javascript:void(0)" class="rn-btn thumbs-icon border">
                            <span id="m-cat" class="text-capitalize"></span>
                        </a>
                        <a href="" class="rn-btn border" id="project-link" target="_blank">
                            <span>VIEW PROJECT</span>
                            {{-- <i data-feather="chevron-right"></i> --}}
                        </a>
                    </div>
                    <h2 class="title text-capitalize" id="m-name"></h2>
                    <div id="p-desc">

                    </div>
                </div>

                <!-- Comment Section Area Start -->
                {{-- <div class="comment-inner">
                    <h3 class="title mb--40 mt--50">Leave a Reply</h3>
                    <form action="#">
                        <div class="row">
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="rnform-group"><input type="text" placeholder="Name">
                                </div>
                                <div class="rnform-group"><input type="email" placeholder="Email">
                                </div>
                                <div class="rnform-group"><input type="text" placeholder="Website">
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-12 col-12">
                                <div class="rnform-group">
                                    <textarea placeholder="Comment"></textarea>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <a class="rn-btn" href="#"><span>SUBMIT NOW</span></a>
                            </div>
                        </div>
                    </form>
                </div> --}}
                <!-- Comment Section End -->
            </div>
            <!-- End of .modal-body -->
        </div>
    </div>
</div>
<!-- End Modal Blog area -->
@include('web.layout.footer')