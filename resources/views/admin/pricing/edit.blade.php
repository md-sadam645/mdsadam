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
                        <form class="row g-3" action="{{url('pricing/update/'.$list->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-6">
                                <label for="plan" class="form-label">Plan<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="@if(!empty($list)) {{$list->plan}} @endif" id="plan" placeholder="Enter plan" required name="plan">
                                @if($errors->has('plan'))
                                    <div class="form-error text-danger">{{ $errors->first('plan') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="title" class="form-label"> Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="@if(!empty($list)) {{$list->title}} @endif" id="title" placeholder="Enter Title" required name="title">
                                @if($errors->has('title'))
                                    <div class="form-error text-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="subtitle" class="form-label">Sub Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="@if(!empty($list)) {{$list->subtitle}} @endif" id="subtitle" placeholder="Enter Subtitle" required name="subtitle">
                                @if($errors->has('subtitle'))
                                    <div class="form-error text-danger">{{ $errors->first('subtitle') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="price" class="form-label">Price<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="price" value="{{$list->price}}" placeholder="10000" name="price" required>
                                @if($errors->has('price'))
                                    <div class="form-error text-danger">{{ $errors->first('price') }}</div>
                                @endif
                            </div>
                            {{$list->servicetwo}}
                            @if(!empty($list))
                                @php 
                                    $serviceOne = json_decode($list->serviceOne);
                                    $servicetwo = json_decode($list->serviceTwo);
                                @endphp
                            @endif

                            <div class="col-md-12 col-lg-6" id="serviceOne-con">
                                <label for="serviceOne" class="form-label">Service One<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="serviceOne" name="serviceOne[]" value="{{$serviceOne[0]}}" placeholder="Enter services" required>
                                    <span class="input-group-text serviceone-add-el" style="cursor:pointer;"><i class="fa fa-plus"></i></span>
                                </div>
                                @if(!empty($list))
                                    @if(count($serviceOne) > 1)
                                        @for($i = 1; $i < count($serviceOne) ; $i++)
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" id="serviceOne" name="serviceOne[]" placeholder="Enter services" value="{{$serviceOne[$i]}}" required>
                                            <span class="input-group-text serviceone-remove-el" style="cursor:pointer;"><i class="fa fa-minus"></i></span>
                                        </div>
                                        @endfor
                                    @endif
                                @endif
                                @if($errors->has('serviceOne'))
                                    <div class="form-error text-danger">{{ $errors->first('serviceOne') }}</div>
                                @endif
                            </div>
                           
                            <div class="col-md-12 col-lg-6" id="servicetwo-con">
                                <label for="servicetwo" class="form-label">Service One<span class="text-danger">*</span></label>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="servicetwo" name="serviceTwo[]" value="{{$servicetwo[0]}}" placeholder="Enter services" required>
                                    <span class="input-group-text servicetwo-add-el" style="cursor:pointer;"><i class="fa fa-plus"></i></span>
                                </div>
                                @if(!empty($list))
                                    @if(count($servicetwo) > 1)
                                        @for($i = 1; $i < count($servicetwo) ; $i++)
                                        <div class="input-group mt-3">
                                            <input type="text" class="form-control" id="servicetwo" value="{{$servicetwo[$i]}}" name="serviceTwo[]" placeholder="Enter services" required>
                                            <span class="input-group-text servicetwo-remove-el" style="cursor:pointer;"><i class="fa fa-minus"></i></span>
                                        </div>
                                        @endfor
                                    @endif
                                @endif
                                @if($errors->has('serviceTwo'))
                                    <div class="form-error text-danger">{{ $errors->first('serviceTwo') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="recommended" class="form-label">Recommended</label>
                                <input type="text" class="form-control" id="recommended" value="@if(!empty($list)) {{$list->recommended}} @endif" placeholder="recommended" name="recommended">
                                @if($errors->has('recommended'))
                                    <div class="form-error text-danger">{{ $errors->first('recommended') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                <select class="form-control" id="status" required name="status">
                                    <option value="1" @if(!empty($list->status == 1)) selected @endif>Active</option>
                                    <option value="0" @if(!empty($list->status == 0)) selected @endif>Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                    <div class="form-error text-danger">{{ $errors->first('status') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <label for="desc" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" style="height:150px;" rows="5" placeholder="Enter Description" id="desc" name="description" required>@if(!empty($list)) {{$list->description}} @endif</textarea>
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
                                   Update Pricing
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

