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
                        <form class="row g-3" action="{{url('slider/add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-6">
                                <label for="tagline" class="form-label">Tag Line<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tagline" placeholder="Enter your tagline" value="@if(!empty($list)) {{$list->tagline}} @endif" name="tagline" required>
                                @if($errors->has('tagline'))
                                    <div class="form-error text-danger">{{ $errors->first('tagline') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="name" class="form-label">Full Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="Enter your name" value="@if(!empty($list)) {{$list->name}} @endif" required name="name">
                                @if($errors->has('name'))
                                <div class="form-error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>
                            
                            @if(!empty($list))
                                @php 
                                    $allSkill = json_decode($list->skill);
                                    $allDesc = json_decode($list->designation);
                                @endphp
                            @endif

                            <div class="col-md-12 col-lg-6" id="desig-con">
                                <label for="designation" class="form-label">Designation<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="designation" name="designation[]" placeholder="Enter Your Designation" value="@if(!empty($list)) {{$allDesc[0]}} @endif" required>
                                    <span class="input-group-text desig-add-el" style="cursor:pointer;"><i class="fa fa-plus"></i></span>
                                </div>
                                @if(!empty($list))
                                    @if(count($allDesc) > 1)
                                        @for($i = 1; $i < count($allDesc) ; $i++)
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="designation" name="designation[]" value="{{$allDesc[$i]}}" required>
                                            <span class="input-group-text desig-remove-el" style="cursor:pointer;"><i class="fa fa-minus"></i></span>
                                        </div>
                                        @endfor
                                    @endif
                                @endif
                                @if($errors->has('designation'))
                                    <div class="form-error text-danger">{{ $errors->first('designation') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6" id="skill-con">
                                <label for="skill" class="form-label">Skill On<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="skill" name="skill[]" placeholder="Enter Your Skill" value="@if(!empty($list)) {{$allSkill[0]}} @endif" required>
                                    <span class="input-group-text skill-add-el" style="cursor:pointer;"><i class="fa fa-plus"></i></span>
                                </div>
                                @if(!empty($list))
                                    @if(count($allSkill) > 1)
                                        @for($i = 1; $i < count($allSkill) ; $i++)
                                        <div class="input-group mt-3">
                                            <input type="text" class="form-control" id="skill" name="skill[]" value="{{$allSkill[$i]}}" required>
                                            <span class="input-group-text skill-remove-el" style="cursor:pointer;"><i class="fa fa-minus"></i></span>
                                        </div>
                                        @endfor
                                    @endif
                                @endif
                                @if($errors->has('skill'))
                                    <div class="form-error text-danger">{{ $errors->first('skill') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="image" class="form-label">Image<span class="text-danger">*</span> <small class="slider-img-error">(700*960px)</small></label>
                                <input type="file" class="form-control" id="image" name="image" @if(empty($list)) required @endif accept="image/png, image/jpeg, image/jpg">
                                <input type="text" class="form-control d-none" id="image" name="oldImage" value="@if(!empty($list)) {{$list->image}} @endif">
                                @if($errors->has('image'))
                                    <div class="form-error text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="desc" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="5" style="height:150px;" placeholder="Enter Description" id="desc" name="description" required>@if(!empty($list)) {{$list->description}} @endif</textarea>
                                @if($errors->has('description'))
                                <div class="form-error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                                <!-- ck editor js code -->
                                {{-- <script>
                                    CKEDITOR.replace('description');
                                </script> --}}
                            </div>

                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-lg slider-btn btn-block">
                                    @if(!empty($list)) Update Slider @else {{$title}} @endif
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

