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
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- Form Element sizes -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Add Customer</h3>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="inputClientCompany">Name:</label>
                                    <input type="text" name="name" id="inputClientCompany" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Email:</label>
                                    <input type="email" name="email" id="inputClientCompany" class="form-control">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Addess:</label>
                                    <input type="text" name="addess" id="inputClientCompany" class="form-control">
                                    @error('addess')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Password:</label>
                                    <input type="password" name="password" id="inputClientCompany" class="form-control">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Password Confirmation:</label>
                                    <input type="password" name="password_confirmation" id="inputClientCompany" class="form-control">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Roles:</label>
                                    <select name="role" class="form-control custom-select">
                                        @foreach(App\Models\Customer::$STATUS as $key => $status)
                                            <option @if ($key == App\Models\Customer::ENABLE_CUSTOMER) {{ 'selected' }} @endif value="{{$key}}">{{ ucfirst($status)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Status:</label>
                                    <select name="status" class="form-control custom-select">
                                            @foreach(App\Models\Customer::$CUSTOMER as $key => $customer)
                                                <option @if ($key == App\Models\Customer::ROLE_CUSTOMER) {{ 'selected' }} @endif value="{{$key}}">{{ ucfirst($customer)}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
</div>
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