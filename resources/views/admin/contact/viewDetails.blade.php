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
                <div class="col-md-12 col-lg-4">
                  <b>Name</b>
                  <p class="text-capitalize">{{$list->name}}</p>
                </div>
                <div class="col-md-12 col-lg-4">
                  <b>Mobile</b>
                  <p><a href="tel:{{$list->mobile}}">{{$list->mobile}}</a></p>
                </div>
                <div class="col-md-12 col-lg-4">
                  <b>Email</b>
                  <p><a href="mailto:{{$list->email}}" target="_blank">{{$list->email}}</a></p>
                </div>
                <div class="col-md-12">
                  <b>Subject</b>
                  <p>
                    {{$list->subject}}
                  </p>
                </div>
                <div class="col-md-12">
                  <b>Message</b>
                  <p>{{$list->message}}</p>
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