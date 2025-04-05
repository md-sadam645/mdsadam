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
                        <form class="row g-3" action="{{url('portfolio/update/'.$list->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-6">
                                <label for="pname" class="form-label">Project Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="pname" placeholder="Enter Project Name" value="{{$list->pname}}" name="pname" required>
                                @if($errors->has('pname'))
                                    <div class="form-error text-danger">{{ $errors->first('pname') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="category" class="form-label">Category<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="category" placeholder="Enter Category" value="{{$list->category}}" name="category" required>
                                @if($errors->has('category'))
                                    <div class="form-error text-danger">{{ $errors->first('category') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="plink" class="form-label">Project Link<span class="text-danger">*</span></label>
                                <input type="url" class="form-control" id="plink" placeholder="Enter Project Link" value="{{$list->plink}}" required name="plink">
                                @if($errors->has('plink'))
                                    <div class="form-error text-danger">{{ $errors->first('plink') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="subCat" class="form-label">Sub Category<span class="text-danger">*</span></label>
                                <select class="form-control" id="subCat" required name="subCat">
                                    <option value="select category">Select category</option>
                                    <option value="mern" @if(!empty($list) && $list->subCat == 'mern') selected @endif>MERN</option>
                                    <option value="react-native" @if(!empty($list) && $list->subCat == 'react-native') selected @endif>REACT NATIVE</option>
                                    <option value="laravel" @if(!empty($list) && $list->subCat == 'laravel') selected @endif>LARAVEL</option>
                                </select>
                                @if($errors->has('subCat'))
                                    <div class="form-error text-danger">{{ $errors->first('subCat') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="profile" class="form-label">Profile Image<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="profile" name="profile" accept=".png, .jpg, .jpeg">
                                <input type="text" class="d-none form-control" id="profile" value="{{$list->profile}}" name="oldProfile" >
                                @if($errors->has('profile'))
                                    <div class="form-error text-danger">{{ $errors->first('profile') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="slider" class="form-label">Slider Image<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="slider" multiple name="slider[]" accept=".png, .jpg, .jpeg">
                                <input type="text" class="d-none form-control" id="slider" value="{{$list->slider}}" name="oldSlider" >
                                @if($errors->has('slider'))
                                    <div class="form-error text-danger">{{ $errors->first('slider') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <label for="desc" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="6" placeholder="Enter Description" id="desc" name="description" required>{{$list->description}}</textarea>
                                @if($errors->has('description'))
                                    <div class="form-error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                                <!-- ck editor js code -->
                                <script>
                                    CKEDITOR.replace('description');
                                </script>
                            </div>

                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-lg slider-btn btn-block">
                                   Update Portfolio
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

