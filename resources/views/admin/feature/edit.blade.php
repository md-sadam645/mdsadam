@extends('AdminLayout.index')
<style>
    /* .page-footer
    {
        position:fixed;
        bottom: 0px;
    } */
</style>
@section('content')

<div class="page-body mb-3 px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid mb-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header py-3 bg-transparent border-bottom-0">
                        <h6 class="card-title mb-0">{{$title}}</h6>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{url('feature/update/'.$list->id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12 col-lg-6">
                                <label for="icon" class="form-label">Icon<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="icon" value="{{$list->icon}}" required name="icon">
                                @if($errors->has('icon'))
                                    <div class="form-error text-danger">{{ $errors->first('icon') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-6">
                                <label for="title" class="form-label">Title<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="title" value="{{$list->title}}" required name="title">
                                @if($errors->has('title'))
                                    <div class="form-error text-danger">{{ $errors->first('title') }}</div>
                                @endif
                            </div>

                            <div class="col-md-12 col-lg-12">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" placeholder="Enter Description third" id="description" rows="5" name="description">{{$list->description}}</textarea>
                                @if($errors->has('description'))
                                    <div class="form-error text-danger">{{ $errors->first('description') }}</div>
                                @endif
                                <!-- ck editor js code -->
                                {{-- <script>
                                    CKEDITOR.replace('description');
                                </script> --}}
                            </div>

                            <div class="col-md-12 mt-3">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Update Feature</button>
                            </div>
                        </form>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

