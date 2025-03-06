  <!-- start: sidebar -->
  <div class="sidebar p-2 py-md-3">
    <div class="container-fluid">
        <!-- sidebar: title-->
        <div class="title-text d-flex align-items-center mb-4 mt-1">
            <h4 class="sidebar-title mb-0 flex-grow-1">
                <a href="{{url('/dashboard')}}">
                    {{-- <span class="sm-txt dash-logo" >MD.</span> --}}
                        <img src="{{url('images/logo/logof2.png')}}" alt="logo-transparent" width="200px" />
                    {{-- <span class="dash-logo">Sadam</span> --}}
                </a>
            </h4>
        </div>
        <!-- sidebar: menu list -->
        <div class="main-menu flex-grow-1">
            <ul class="menu-list">
                <li class="divider py-2 lh-sm"><span class="small">MAIN</span><br> <small class="text-muted">Features at glance </small></li>
                <li>
                    <a class="m-link @if($title=='Dashboard'){ active } @endif" href="{{route('dashboard')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" fill="currentColor" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                            <path class="fill-secondary" fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                        </svg>
                        <span class="ms-2">My Dashboard</span>
                    </a>
                </li>
        
                <li>
                    <a class="m-link @if($title=='Create Slider'){ active } @endif" href="{{url('slider/create')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
                            <path d="M160 80H512c8.8 0 16 7.2 16 16V320c0 8.8-7.2 16-16 16H490.8L388.1 178.9c-4.4-6.8-12-10.9-20.1-10.9s-15.7 4.1-20.1 10.9l-52.2 79.8-12.4-16.9c-4.5-6.2-11.7-9.8-19.4-9.8s-14.8 3.6-19.4 9.8L175.6 336H160c-8.8 0-16-7.2-16-16V96c0-8.8 7.2-16 16-16zM96 96V320c0 35.3 28.7 64 64 64H512c35.3 0 64-28.7 64-64V96c0-35.3-28.7-64-64-64H160c-35.3 0-64 28.7-64 64zM48 120c0-13.3-10.7-24-24-24S0 106.7 0 120V344c0 75.1 60.9 136 136 136H456c13.3 0 24-10.7 24-24s-10.7-24-24-24H136c-48.6 0-88-39.4-88-88V120zm208 24a32 32 0 1 0 -64 0 32 32 0 1 0 64 0z"/>
                         </svg>
                        <span class="ms-2">Slider</span>
                    </a>
                </li>

                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#feature" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
                            <path d="M40 48C26.7 48 16 58.7 16 72v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V72c0-13.3-10.7-24-24-24H40zM192 64c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zm0 160c-17.7 0-32 14.3-32 32s14.3 32 32 32H480c17.7 0 32-14.3 32-32s-14.3-32-32-32H192zM16 232v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V232c0-13.3-10.7-24-24-24H40c-13.3 0-24 10.7-24 24zM40 368c-13.3 0-24 10.7-24 24v48c0 13.3 10.7 24 24 24H88c13.3 0 24-10.7 24-24V392c0-13.3-10.7-24-24-24H40z"/>
                        </svg>
                        <span class="ms-2">Feature</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="feature">
                        <li><a class="ms-link" href="{{url('feature/create')}}">Create</a></li>
                        <li><a class="ms-link" href="{{url('feature/view')}}">View</a></li>
                    </ul>
                </li>
        
                <li class="collapsed">
                    <a class="m-link" data-bs-toggle="collapse" data-bs-target="#portfolio" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
                           <path d="M64 464c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16H224v80c0 17.7 14.3 32 32 32h80V448c0 8.8-7.2 16-16 16H64zM64 0C28.7 0 0 28.7 0 64V448c0 35.3 28.7 64 64 64H320c35.3 0 64-28.7 64-64V154.5c0-17-6.7-33.3-18.7-45.3L274.7 18.7C262.7 6.7 246.5 0 229.5 0H64zm72 208c-13.3 0-24 10.7-24 24V336v56c0 13.3 10.7 24 24 24s24-10.7 24-24V360h44c42 0 76-34 76-76s-34-76-76-76H136zm68 104H160V256h44c15.5 0 28 12.5 28 28s-12.5 28-28 28z"/>
                        </svg>
                        <span class="ms-2">Portfolio</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="portfolio">
                        <li><a class="ms-link" href="{{url('portfolio/create')}}">Create</a></li>
                        <li><a class="ms-link" href="{{url('portfolio/view')}}">View</a></li>
                    </ul>
                </li>

                <li class="collapsed">
                    <a class="m-link @if($title == 'Create Education' || $title == 'View Education' || $title == 'Edit Education' || $title == 'View in Details Education'){ active } @endif" data-bs-toggle="collapse" data-bs-target="#education" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
                            <path d="M219.3 .5c3.1-.6 6.3-.6 9.4 0l200 40C439.9 42.7 448 52.6 448 64s-8.1 21.3-19.3 23.5L352 102.9V160c0 70.7-57.3 128-128 128s-128-57.3-128-128V102.9L48 93.3v65.1l15.7 78.4c.9 4.7-.3 9.6-3.3 13.3s-7.6 5.9-12.4 5.9H16c-4.8 0-9.3-2.1-12.4-5.9s-4.3-8.6-3.3-13.3L16 158.4V86.6C6.5 83.3 0 74.3 0 64C0 52.6 8.1 42.7 19.3 40.5l200-40zM111.9 327.7c10.5-3.4 21.8 .4 29.4 8.5l71 75.5c6.3 6.7 17 6.7 23.3 0l71-75.5c7.6-8.1 18.9-11.9 29.4-8.5C401 348.6 448 409.4 448 481.3c0 17-13.8 30.7-30.7 30.7H30.7C13.8 512 0 498.2 0 481.3c0-71.9 47-132.7 111.9-153.6z"/>
                        </svg>
                        <span class="ms-2">Education</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="education">
                        <li><a class="ms-link" href="{{url('education/create')}}">Create</a></li>
                        <li><a class="ms-link" href="{{url('education/view')}}">View</a></li>
                    </ul>
                </li>

                <li class="collapsed">
                    <a class="m-link @if($title == 'Create Skill' || $title == 'View Skill' || $title == 'Edit Skill' || $title == 'View in Details Skill'){ active } @endif" data-bs-toggle="collapse" data-bs-target="#Skill" href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
                          <path d="M211 7.3C205 1 196-1.4 187.6 .8s-14.9 8.9-17.1 17.3L154.7 80.6l-62-17.5c-8.4-2.4-17.4 0-23.5 6.1s-8.5 15.1-6.1 23.5l17.5 62L18.1 170.6c-8.4 2.1-15 8.7-17.3 17.1S1 205 7.3 211l46.2 45L7.3 301C1 307-1.4 316 .8 324.4s8.9 14.9 17.3 17.1l62.5 15.8-17.5 62c-2.4 8.4 0 17.4 6.1 23.5s15.1 8.5 23.5 6.1l62-17.5 15.8 62.5c2.1 8.4 8.7 15 17.1 17.3s17.3-.2 23.4-6.4l45-46.2 45 46.2c6.1 6.2 15 8.7 23.4 6.4s14.9-8.9 17.1-17.3l15.8-62.5 62 17.5c8.4 2.4 17.4 0 23.5-6.1s8.5-15.1 6.1-23.5l-17.5-62 62.5-15.8c8.4-2.1 15-8.7 17.3-17.1s-.2-17.4-6.4-23.4l-46.2-45 46.2-45c6.2-6.1 8.7-15 6.4-23.4s-8.9-14.9-17.3-17.1l-62.5-15.8 17.5-62c2.4-8.4 0-17.4-6.1-23.5s-15.1-8.5-23.5-6.1l-62 17.5L341.4 18.1c-2.1-8.4-8.7-15-17.1-17.3S307 1 301 7.3L256 53.5 211 7.3z"/>
                        </svg>
                        <span class="ms-2">Skill</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="Skill">
                        <li><a class="ms-link" href="{{url('skill/create')}}">Create</a></li>
                        <li><a class="ms-link" href="{{url('skill/view')}}">View</a></li>
                    </ul>
                </li>

                <li class="collapsed">
                    <a class="m-link @if($title == 'Create Experience' || $title == 'View Experience' || $title == 'Edit Experience' || $title == 'View in Details Experience'){ active } @endif" data-bs-toggle="collapse" data-bs-target="#Experience" href="#">
                        <i class='fas fa-file-alt'></i>
                        <span>Experience</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="Experience">
                        <li><a class="ms-link" href="{{url('experience/create')}}">Create</a></li>
                        <li><a class="ms-link" href="{{url('experience/view')}}">View</a></li>
                    </ul>
                </li>

                <li class="collapsed">
                    <a class="m-link @if($title == 'Create Pricing'){ active } @endif" data-bs-toggle="collapse" data-bs-target="#Pricing" href="#">
                        <i class="fa-solid fa-credit-card"></i>
                        <span>Pricing</span>
                        <span class="arrow fa fa-angle-right ms-auto text-end"></span>
                    </a>
                    <!-- Menu: Sub menu ul -->
                    <ul class="sub-menu collapse" id="Pricing">
                        <li><a class="ms-link" href="{{url('pricing/create')}}">Create</a></li>
                        <li><a class="ms-link" href="{{url('pricing/view')}}">View</a></li>
                    </ul>
                </li>

                <li>
                    <a class="m-link @if($title=='Create Contact Detail'){ active } @endif" href="{{url('contact-detail/create')}}">
                        <i class="fa-solid fa-address-card"></i>
                        <span >Contact Detail</span>
                    </a>
                </li>

                <li>
                    <a class="m-link @if($title=='View Contact-Us'){ active } @endif" href="{{url('contact-us/view')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512">
                           <path d="M96 0C60.7 0 32 28.7 32 64V448c0 35.3 28.7 64 64 64H384c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64H96zM208 288h64c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16H144c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zM512 80c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V80zM496 192c-8.8 0-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm16 144c0-8.8-7.2-16-16-16s-16 7.2-16 16v64c0 8.8 7.2 16 16 16s16-7.2 16-16V336z"/>
                        </svg>
                        <span class="ms-2">Contact Us</span>
                    </a>
                </li>
                <li>
                    <a class="m-link @if($title=='Create Master Control'){ active } @endif" href="{{url('master-control/view')}}">
                        <i class="fa-solid fa-gauge"></i>
                        <span>Master Control</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>