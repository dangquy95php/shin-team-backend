@extends('admin.layouts.master')

@push('css')
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
  
       <!-- Main content -->
    <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">List Users</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body p-0">
    <table class="table table-striped projects">
        <thead>
            <tr>
                <th style="width: 1%">
                    STT
                </th>
                <th style="width: 20%">
                    Name
                </th>
                <th style="width: 30%">
                    Email
                </th>
                <th>
                    Addess
                </th>
                <th>
                    Role
                </th>
                <th style="width: 8%" class="text-center">
                    Status
                </th>
                <th style="width: 20%" class="text-right">
                  <a class="btn btn-primary" href="{{route('customer_add')}}">Add</a>
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach($custonmers as $key => $custonmer)
        <tr>
          <td>
              {{$key + 1}}
          </td>
          <td>
              <a>
              {{$custonmer->name}}
              </a>
          </td>
          <td>
          {{$custonmer->email}}
          </td>
          <td>
            {{$custonmer->address}}
          </td>
          <td>
          @foreach(App\Models\Customer::$CUSTOMER as $k => $cus)
            {{($custonmer->role == $k) ? $cus : ''}}
          @endforeach
          </td>
          <td class="project-state">
            @foreach(App\Models\Customer::$STATUS as $k => $sta)
              @if ($custonmer->status == $k)
                <span class="badge badge-{{(boolean)$k == true ? 'success' : 'danger'}}">{{$sta}}</span>
              @endif
            @endforeach
          </td>
          <td class="project-actions text-right">
              <a class="btn btn-info btn-sm" href="/admin/customer/{{$custonmer->id}}/edit">
              <i class="fas fa-pencil-alt">
              </i>
              Edit
              </a>
              <a class="btn btn-danger btn-sm" href="/admin/customer/{{$custonmer->id}}/delete">
              <i class="fas fa-trash">
              </i>
              Delete
              </a>
          </td>
      </tr>
      @endforeach
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @jquery
  @toastr_js
  @toastr_render
  @endsection

@push('js')
    <!-- DataTables -->
    <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../dist/js/demo.js"></script>
    <!-- page script -->
    <script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
    </script>
@endpush