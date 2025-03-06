@extends('AdminLayout.index')
<style>
    .page-footer
    {
        position:fixed;
        bottom: 0px;
    }
</style>
@section('content')
<div class="page-body mb-5 px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h6 class="card-title mb-0">{{$title}}</h6>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{url('master-control/add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-6">
                                <label for="logo" class="form-label">Logo<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="logo" name="logo" @if(empty($list)) required @endif accept="image/png, image/jpeg, image/jpg">
                                <input type="text" class="form-control d-none" id="logo" name="oldlogo" value="@if(!empty($list)) {{$list->logo}} @endif">
                                @if($errors->has('logo'))
                                    <div class="form-error text-danger">{{ $errors->first('logo') }}</div>
                                @endif
                            </div>
                            
                            <div class="col-md-12 col-lg-6">
                                <label for="favicon" class="form-label">Favicon<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="favicon" name="favicon" @if(empty($list)) required @endif accept="image/png, image/jpeg, image/jpg">
                                <input type="text" class="form-control d-none" id="favicon" name="oldfavicon" value="@if(!empty($list)) {{$list->favicon}} @endif">
                                @if($errors->has('favicon'))
                                    <div class="form-error text-danger">{{ $errors->first('favicon') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="resume" class="form-label">Resume<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="resume" name="resume" @if(empty($list)) required @endif accept="application/pdf">
                                <input type="text" class="form-control d-none" id="resume" name="oldresume" value="@if(!empty($list)) {{$list->resume}} @endif">
                                @if($errors->has('resume'))
                                    <div class="form-error text-danger">{{ $errors->first('resume') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="github" class="form-label">Github<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="github" placeholder="Enter github link" value="@if(!empty($list)) {{$list->github_link}} @endif" required name="github_link">
                                @if($errors->has('github_link'))
                                    <div class="form-error text-danger">{{ $errors->first('github_link') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="linkedin" class="form-label">Linkedin<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subtitle" placeholder="Enter linkedin link" value="@if(!empty($list)) {{$list->linkedin_link}} @endif" required name="linkedin_link">
                                @if($errors->has('linkedin_link'))
                                    <div class="form-error text-danger">{{ $errors->first('linkedin_link') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="pricing" class="form-label">Pricing Status<span class="text-danger">*</span></label>
                                <select class="form-control" id="pricing" required name="pricing_status">
                                    {{-- <option value="select status">Select Status</option> --}}
                                    <option value="1" @if(!empty($list) && $list->pricing_status == 1) selected @endif>Show</option>
                                    <option value="0" @if(!empty($list) && $list->pricing_status == 0) selected @endif>Hide</option>
                                </select>
                                @if($errors->has('pricing_status'))
                                    <div class="form-error text-danger">{{ $errors->first('pricing_status') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="portfolio_quote" class="form-label">Portfolio Quote</label>
                                <input type="text" class="form-control" id="portfolio_quote" name="portfolio_quote" value="@if(!empty($list)) {{$list->portfolio_quote}} @endif">
                                @if($errors->has('portfolio_quote'))
                                    <div class="form-error text-danger">{{ $errors->first('portfolio_quote') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="experience" class="form-label">Experience</label>
                                <input type="text" class="form-control" id="experience" name="experience" value="@if(!empty($list)) {{$list->experience}} @endif">
                                @if($errors->has('experience'))
                                    <div class="form-error text-danger">{{ $errors->first('experience') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-lg slider-btn btn-block">
                                  @if(!empty($list)) Update Master Control @else  {{$title}} @endif
                                </button>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{url('assets/backend/js/slider.js')}}"></script>
@endsection

