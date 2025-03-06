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
                        <form class="row g-3" action="{{url('education/update/'.$list->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-6">
                                <label for="course_name" class="form-label">Course Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="course_name" placeholder="Enter Course Name" value="{{$list->course_name}}" name="course_name" required>
                                @if($errors->has('course_name'))
                                    <div class="form-error text-danger">{{ $errors->first('course_name') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="organization_name" class="form-label">Organization Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="organization_name" placeholder="Enter Organization Name" value="{{$list->organization_name}}" required name="organization_name">
                                @if($errors->has('organization_name'))
                                    <div class="form-error text-danger">{{ $errors->first('organization_name') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="duration" class="form-label">Duration<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="duration" placeholder="Example (2020 - 2023)" value="{{$list->duration}}" name="duration" required>
                                @if($errors->has('duration'))
                                    <div class="form-error text-danger">{{ $errors->first('duration') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="grade" class="form-label">Grade<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="grade" placeholder="Example 2.4 / 4" value="{{$list->grade}}" required name="grade">
                                @if($errors->has('grade'))
                                    <div class="form-error text-danger">{{ $errors->first('grade') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="percentage" class="form-label">Percentage<span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="percentage" step="0.01" placeholder="Example 60" value="{{$list->percentage}}" required name="percentage">
                                @if($errors->has('percentage'))
                                    <div class="form-error text-danger">{{ $errors->first('percentage') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="status" class="form-label">Status<span class="text-danger">*</span></label>
                                <select class="form-control" id="status" required name="status">
                                    {{-- <option value="select status">Select Status</option> --}}
                                    <option value="1" @if($list->status == 1) selected @endif>Active</option>
                                    <option value="0" @if($list->status == 0) selected @endif>Inactive</option>
                                </select>
                                @if($errors->has('status'))
                                    <div class="form-error text-danger">{{ $errors->first('status') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <label for="desc" class="form-label">Description<span class="text-danger">*</span></label>
                                <textarea class="form-control" rows="6" placeholder="Enter Description" id="desc" rows="5" name="description" required>{{$list->description}}</textarea>
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
                                   Update Education
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

