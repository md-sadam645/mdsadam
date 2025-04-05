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
                        <form class="row g-3" action="{{url('contact-detail/add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-6">
                                <label for="cimage" class="form-label">Image<span class="text-danger">*</span> <small class="slider-img-error">(460*288px)</small></label>
                                <input type="file" class="form-control" id="cimage" name="image" @if(empty($list)) required @endif accept="image/png, image/jpeg, image/jpg">
                                <input type="text" class="form-control d-none" id="image" name="oldImage" value="@if(!empty($list)) {{$list->image}} @endif">
                                @if($errors->has('image'))
                                    <div class="form-error text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="title" class="form-label"> Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title" value="@if(!empty($list)) {{$list->title}} @endif" required name="title">
                                @if($errors->has('title'))
                                    <div class="form-error text-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="subtitle" class="form-label">Sub Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subtitle" placeholder="Enter Subtitle" value="@if(!empty($list)) {{$list->subtitle}} @endif" required name="subtitle">
                                @if($errors->has('subtitle'))
                                    <div class="form-error text-danger">{{ $errors->first('subtitle') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="mobile" class="form-label">Mobile<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="mobile" placeholder="Enter Mobile" value="{{$list->mobile}}" required name="mobile">
                                @if($errors->has('mobile'))
                                    <div class="form-error text-danger">{{ $errors->first('mobile') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="email" class="form-label">Email<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" placeholder="Enter Email" name="email" value="@if(!empty($list)) {{$list->email}} @endif" required>
                                @if($errors->has('email'))
                                    <div class="form-error text-danger">{{ $errors->first('email') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                <select class="form-control" id="status" required name="status">
                                    {{-- <option value="select status">Select Status</option> --}}
                                    <option value="1" @if(!empty($list->status == 1)) selected @endif>Active</option>
                                    <option value="0" @if(!empty($list->status == 0)) selected @endif>Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                    <div class="form-error text-danger">{{ $errors->first('status') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <label for="desc" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="6" placeholder="Enter Description" id="desc" name="description" required>@if(!empty($list)) {{$list->description}} @endif</textarea>
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
                                  @if(!empty($list)) Update Contact Detail @else  {{$title}} @endif
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

