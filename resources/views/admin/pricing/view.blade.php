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
              <h6 class="card-title mb-0">{{$title}} <span class="badge bg-primary">{{$count}}</span></h6>
              <div class="mt-3 mt-lg-0">
              </div>
            </div>
            <div class="table-responsive">
                <table id="myTable" class="table card-table display dataTable table-hover align-middle">
                    <thead>
                      <tr>
                        <th>Plan</th>
                        <th>Title</th>
                        <th>SubTitle</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>ACTION</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $listData)
                        <tr>
                            <td class="text-capitalize">{{$listData->plan}}</td>
                            <td class="text-capitalize">{{$listData->title}}</td>
                            <td class="text-capitalize">{{$listData->subtitle}}</td>
                            <td><i class="fa fa-inr"></i> @php echo number_format($listData->price); @endphp</td>
                            
                            <td>
                                @if($listData->status == 1) <b class="text-success">Active</b> @endif
                                @if($listData->status == 0) <b class="text-danger">Inactive </b>@endif
                            </td>
                      
                            <td>
                                <a class="btn btn-info text-white btn-icon btn-sm rounded-pill ms-2" href="{{url('pricing/view-in-details/'.$listData->id)}}" title="View In Details" role="button">
                                  <i class="fa-regular fa-eye"></i>
                                </a>
                                <a class="btn btn-primary btn-icon btn-sm rounded-pill ms-2" href="{{url('pricing/edit/'.$listData->id)}}" title="Edit" role="button">
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-icon btn-sm rounded-pill ms-2" href="{{url('pricing/delete/'.$listData->id)}}" title="Delete" role="button">
                                  <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                     
                    </tbody>
                    <tfoot>
                    
                    </tfoot>
                </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Row end  -->
    </div>
    <!-- start pagination -->
      @if(!empty($list))
        <center>
            {{ $list->links('vendor.pagination.custom') }}
        </center>
      @endif
  <!-- end pagination -->
</div>

@endsection