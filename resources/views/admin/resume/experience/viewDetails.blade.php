@extends('AdminLayout.index')
@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel='stylesheet' href='https://cdn.datatables.net/plug-ins/f2c75b7247b/integration/bootstrap/3/dataTables.bootstrap.css'>

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
                <div class="col-md-12 col-lg-3">
                  <b>Designation</b>
                  <p class="text-capitalize">{{$list->designation}}</p>
                </div>
                <div class="col-md-12 col-lg-3">
                  <b>Company Name</b>
                  <p>{{$list->company_name}}</p>
                </div>
                <div class="col-md-12 col-lg-3">
                  <b>Location</b>
                  <p>{{$list->location}}</p>
                </div>
                <div class="col-md-12 col-lg-3">
                  <b>Duration</b>
                  <p>{{$list->duration}}</p>
                </div>
                <div class="col-md-12 col-lg-12">
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