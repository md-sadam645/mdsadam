@extends('AdminLayout.index')
<style>
 /* @media(min-width: 768px)
  {
    .page-footer
    {
      position:fixed;
      bottom: 0px;
    }
  } */
</style>
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
{{-- <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'> --}}
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>
{{-- <link rel='stylesheet' href='https://cdn.datatables.net/responsive/1.0.4/css/dataTables.responsive.css'> --}}

<div class="page-body mb-3 px-xl-4 px-sm-2 px-0 py-lg-2 py-1 mt-0 mt-lg-3">
    <div class="container-fluid mb-3">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h6 class="card-title mb-0">{{$title}}</h6>
              <div class="mt-3 mt-lg-0">
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12 col-lg-6">
                  <b>Course Name</b>
                  <p class="text-capitalize">{{$list->course_name}}</p>
                </div>
                <div class="col-md-12 col-lg-6">
                  <b>Organization Name</b>
                  <p>{{$list->organization_name}}</p>
                </div>
                <div class="col-md-12 col-lg-4">
                  <b>Duration</b>
                  <p>{{$list->duration}}</p>
                </div>
                <div class="col-md-12 col-lg-4">
                  <b>Grade</b>
                  <p>{{$list->grade}}</p>
                </div>
                <div class="col-md-12 col-lg-4">
                  <b>Percentage</b>
                  <p>{{$list->percentage}}%</p>
                </div>
                <div class="col-md-12">
                  <b>Description</b>
                  <p>{{$list->description}}</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Row end  -->
    </div>
</div>

@endsection