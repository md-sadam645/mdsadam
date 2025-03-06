<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>:: {{$title}} ::</title>
    <link rel="icon" href="{{url('images/logo/logof3.png')}}" type="image/x-icon">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- plugin css file  -->
    <link rel="stylesheet" href="{{url('assets/backend/css/daterangepicker.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/backend/plugin/jvectormap/jquery-jvectormap-2.0.5.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- project css file  -->
    <link rel="stylesheet" href="{{url('assets/backend/css/luno.style.min.css')}}">
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/fontawesome.min.css" integrity="sha512-d0olNN35C6VLiulAobxYHZiXJmq+vl+BGIgAxQtD5+kqudro/xNMvv2yIHAciGHpExsIbKX3iLg+0B6d0k4+ZA==" crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <style>
        .dash-logo{
            color: black;
        }

        .page-footer
        {
            position:fixed;
            bottom: 0px;
        }
    </style>
</head>

<body class="layout-1" data-luno="theme-blue">

  @include('AdminLayout/header')

    <!-- start: page toolbar -->
    <div class="page-toolbar px-xl-4 px-sm-2 px-0 py-3">
        <div class="container-fluid">

            <div class="row mb-3 align-items-center">
                <div class="col">
                    <ol class="breadcrumb bg-transparent mb-0">
                        
                        <li class="breadcrumb-item"><a class="text-secondary" href="{{route('dashboard')}}">Dashboard</a></li>
                        @php
                            $pageUrl = url()->full();
                            $dash = strpos($pageUrl,"dashboard");
                        @endphp
                        @if(empty($dash))
                            <li class="breadcrumb-item active"><a class="text-secondary">{{$title}}</a></li>
                        @endif

                    </ol>
                </div>
            </div>

        </div>
    </div>
    <!-- End: page toolbar -->
@yield('content')
        
@include('AdminLayout.footer')