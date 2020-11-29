@extends('admin.layouts.master')

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

    <div class="card-tools d-flex">
      <div class="form-group mb-0 mr-4">
          <form action="{{route('search_contact')}}" method="get" class="d-flex align-items-center">
            <label for="inputClientCompany" class="m-0 pr-2">Search:</label>
            <input type="text" name="search" value="{{ Request::get('search') ?: '' }}" class="form-control">
            <button type="submit" class="btn btn-info ml-1">Submit</button>
        </form>
      </div>
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
                <th style="width: 30%" class="text-center">
                    Note
                </th>
                <th style="width: 20%" class="text-center">
                  Action
                </th>
            </tr>
        </thead>
        <tbody>
          @foreach($contacts as $key => $contact)
        <tr>
          <td>
              {{$key + 1}}
          </td>
          <td>
              <a>
              {{$contact->name}}
              </a>
          </td>
          <td>
          {{$contact->email}}
          </td>
          <td>
            {{$contact->address}}
          </td>
          <td>
            <textarea name="" id="" cols="30" class="form-control" rows="10">{{$contact->note}}</textarea>
          </td>
          <td class="project-actions text-right">
              <a class="btn btn-info btn-sm" href="/admin/contact/{{$contact->id}}/edit">
              <i class="fas fa-pencil-alt">
              </i>
              Edit
              </a>
              <!-- data-toggle="modal" data-target="#delete-customer" href="{{route('delete_customer', ['id' => 1]) }}" -->
              <a href="#" class="btn btn-danger btn-sm" class="btn btn-danger" onclick="deleteContact({{$contact}})">
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

<div class="modal fade" id="delete-contact">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title font-weight-bold">Delete Contact</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"></div>
      <div class="modal-footer justify-content-end">
        <button type="button" class="btn btn-danger btn-cancel" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-success btn-ok">Ok</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
</section>
<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @jquery
  @toastr_js
  @toastr_render
  @endsection
  
@push('js')
  <script type="text/javascript">
      function deleteContact(object) {
        $('#delete-contact .modal-body').html(`
          <p><span class="font-weight-bold">Name: </span>${object.name ?? 'null'}</p>
          <p><span class="font-weight-bold">Email: </span>${object.email}</p>
          <p><span class="font-weight-bold">Addess: </span>${object.addess ?? 'null'}</p>
        `);
        $('#delete-contact').modal('show');
        $('#delete-contact .btn-ok').click(function() {
          window.location.href = `/admin/contact/${object.id}/delete`; 
        })
      }
  </script>
@endpush