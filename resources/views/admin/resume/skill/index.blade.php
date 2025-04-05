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
                        <form class="row g-3" action="{{url('skill/add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-6">
                                <label for="category" class="form-label">Category Name<span class="text-danger">*</span></label>
                                <select class="form-control" id="category" required name="category">
                                    <option value="development">Development</option>
                                    <option value="other">other</option>
                                </select>
                                @if($errors->has('category'))
                                    <div class="form-error text-danger">{{ $errors->first('category') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="name" class="form-label">Skill Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" placeholder="html" required name="name">
                                @if($errors->has('name'))
                                    <div class="form-error text-danger">{{ $errors->first('name') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="image1" class="form-label">Image<span class="text-danger">*</span></label>
                                <input type="file" class="form-control" id="image1" required name="image">
                                @if($errors->has('image'))
                                    <div class="form-error text-danger">{{ $errors->first('image') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="percentage" class="form-label">Percentage</label>
                                <input type="number" class="form-control" id="percentage" placeholder="Example 60" name="percentage">
                                @if($errors->has('percentage'))
                                    <div class="form-error text-danger">{{ $errors->first('percentage') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                <select class="form-control" id="status" required name="status">
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                    <div class="form-error text-danger">{{ $errors->first('status') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-lg slider-btn btn-block">
                                    {{$title}}
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

