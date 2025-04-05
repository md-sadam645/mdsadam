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
                        <form class="row g-3" action="{{url('pricing/add')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-6">
                                <label for="plan" class="form-label">Plan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="plan" placeholder="Enter plan" required name="plan">
                                @if($errors->has('plan'))
                                    <div class="form-error text-danger">{{ $errors->first('plan') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="title" class="form-label"> Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" placeholder="Enter Title" required name="title">
                                @if($errors->has('title'))
                                    <div class="form-error text-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="subtitle" class="form-label">Sub Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="subtitle" placeholder="Enter Subtitle" required name="subtitle">
                                @if($errors->has('subtitle'))
                                    <div class="form-error text-danger">{{ $errors->first('subtitle') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="price" class="form-label">Price<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="price" placeholder="10000" name="price" required>
                                @if($errors->has('price'))
                                    <div class="form-error text-danger">{{ $errors->first('price') }}</div>
                                @endif
                            </div>
                            
                            <div class="col-md-12 col-lg-6" id="serviceOne-con">
                                <label for="serviceOne" class="form-label">Service One<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="serviceOne" name="serviceOne[]" placeholder="Enter services" required>
                                    <span class="input-group-text serviceone-add-el" style="cursor:pointer;"><i class="fa fa-plus"></i></span>
                                </div>
                                @if($errors->has('serviceOne'))
                                <div class="form-error text-danger">{{ $errors->first('serviceOne') }}</div>
                                @endif
                            </div>
                            
                            <div class="col-md-12 col-lg-6" id="servicetwo-con">
                                <label for="servicetwo" class="form-label">Service One<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="servicetwo" name="serviceTwo[]" placeholder="Enter services" required>
                                    <span class="input-group-text servicetwo-add-el" style="cursor:pointer;"><i class="fa fa-plus"></i></span>
                                </div>
                                @if($errors->has('serviceTwo'))
                                <div class="form-error text-danger">{{ $errors->first('serviceTwo') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="recommended" class="form-label">Recommended</label>
                                <input type="text" class="form-control" id="recommended" placeholder="recommended" name="recommended">
                                @if($errors->has('recommended'))
                                    <div class="form-error text-danger">{{ $errors->first('recommended') }}</div>
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

                            <div class="col-md-12 col-lg-12">
                                <label for="desc" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" style="height:150px;" placeholder="Enter Description" id="desc" rows="5" name="description" required></textarea>
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

