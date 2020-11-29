@extends('admin.layouts.master')

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
                                    <input type="text" name="name"  value="{{old('name')}}"  id="inputClientCompany" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Email:</label>
                                    <input type="email" name="email" value="{{old('email')}}"  id="inputClientCompany" class="form-control">
                                    @error('email')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputClientCompany">Addess:</label>
                                    <input type="text" name="address" value="{{old('address')}}" id="inputClientCompany" class="form-control">
                                    @error('address')
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
                                        @foreach(App\Models\Customer::$CUSTOMER as $key => $customer)
                                            <option {{ (old('role') == $key) ? 'selected' : ''}} value="{{$key}}">{{ ucfirst($customer)}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="inputStatus">Status:</label>
                                    <select name="status" class="form-control custom-select">
                                        @foreach(App\Models\Customer::$STATUS as $key => $status)
                                            <option {{ (old('status') == $key) ? 'selected' : ''}} value="{{$key}}">{{ ucfirst($status)}}</option>
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