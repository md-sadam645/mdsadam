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
                  <b>Plan</b>
                  <p class="text-capitalize">{{$list->plan}}</p>
                </div>
                <div class="col-md-12 col-lg-4">
                  <b>Title</b>
                  <p class="text-capitalize">{{$list->title}}</p>
                </div>
                <div class="col-md-12 col-lg-4">
                  <b>SubTitle</b>
                  <p class="text-capitalize">{{$list->subtitle}}</p>
                </div>
                <div class="col-md-12 col-lg-4">
                  <b>Price</b>
                  <p><i class="fa fa-inr"></i> @php echo number_format($list->price); @endphp</p>
                </div>

                <div class="col-md-12 col-lg-4">
                  <b>Recommended</b>
                  <p>{{$list->recommended}}</p>
                </div>
                <div class="col-md-12 col-lg-4">
                  <b>Service One</b>
                  @php 
                    $serviceOne = json_decode($list->serviceOne);
                  @endphp
                  <p>
                    @foreach ($serviceOne as $serviceOne1)
                      {{$serviceOne1}} ,
                    @endforeach
                  </p>
                </div>

                <div class="col-md-12 col-lg-4">
                  <b>Service Two</b>
                  @php 
                    $serviceTwo = json_decode($list->serviceTwo);
                  @endphp
                  <p>
                    @foreach ($serviceTwo as $serviceTwo1)
                      {{$serviceTwo1}} ,
                    @endforeach
                  </p>
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