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
              <h6 class="card-title mb-0">{{$title}} <span class="badge bg-primary">{{$count}}</span></h6>
              <div class="mt-3 mt-lg-0">
              </div>
            </div>
            <div class="table-responsive">
                <table id="myTable" class="table card-table display dataTable table-hover align-middle">
                    <thead>
                      <tr>
                        <th>Icon</th>
                        <th>Title</th>
                        {{-- <th>Description</th> --}}
                        {{-- <th>Status</th> --}}
                        <th>ACTION</th>
                       </tr>
                    </thead>
                    <tbody>
                        @foreach($list as $listData)
                        <tr>
                            <td><i class="{{$listData->icon}}" style="font-size: 20px;"></i></td>
                            <td class="text-capitalize">{{$listData->title}}</td>
                            {{-- <td class="text-capitalize">{{$listData->description}}</td> --}}
                            
                            {{-- <td>
                                @if($listData->status == 1) <b class="text-success">Active</b> @endif
                                @if($listData->status == 0) <b class="text-danger">Inactive </b>@endif
                            </td> --}}
                      
                            <td>
                                <a class="btn btn-info text-white btn-icon btn-sm rounded-pill ms-2" href="{{url('feature/view-in-details/'.$listData->id)}}" title="View In Details" role="button">
                                  <i class="fa-regular fa-eye"></i>
                                </a>
                                <a class="btn btn-success btn-icon btn-sm rounded-pill ms-2" href="{{url('feature/edit/'.$listData->id)}}" role="button">
                                  <i class="fa fa-edit"></i>
                                </a>
                                <a class="btn btn-danger btn-icon btn-sm rounded-pill ms-2" href="{{url('feature/delete/'.$listData->id)}}" role="button">
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