@extends('admin.app.app')

@section('styles')
<!-- DataTables -->
<link href="{{ asset('assets/admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
  type="text/css" />
<link href="{{ asset('assets/admin/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet"
  type="text/css" />

<!-- Responsive datatable examples -->
<link href="{{ asset('assets/admin/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}"
  rel="stylesheet" type="text/css" />
@endsection

@section('main-content')
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">Students</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Dashboards</li>
                                <li class="breadcrumb-item active">Students</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable-buttons" class="table table-busered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        {{-- <th>Type</th>
                                        <th>Status</th>
                                        <th>Phone</th>
                                        <th>Payment Type</th>
                                        <th>Transaction ID</th> --}}
                                        {{-- <th>Action</th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->phone }}</td>
                                        {{-- <td>
                                            @if ($user->status == 1)
                                            <a class="btn btn-danger waves-effect btn-circle waves-light"
                                              href="{{ route('users.inactive', $user->id) }}">
                                        <i class="fa fa-eye-slash"></i> </a>
                                        @elseif($user->status == 2)
                                        <a class="btn btn-success waves-effect btn-circle waves-light"
                                          href="{{ route('users.pending', $user->id) }}">
                                            accept user </a>
                                        @else
                                        <a class="btn btn-success waves-effect btn-circle waves-light"
                                          href="{{ route('users.active', $user->id) }}">
                                            <i class="fa fa-eye"></i> </a>
                                        @endif

                                        {{-- <a class="btn btn-primary waves-effect btn-circle waves-light"
                                              href="{{ route('users.edit', $user->id) }}">
                                        <i class="fa fa-edit"></i> </a>
                                        <form hidden action="{{ route('users.destroy', $user->id) }}"
                                          id="form{{ $user->id }}" method="get">
                                            @csrf
                                        </form>
                                        <button class="btn btn-danger waves-effect btn-circle waves-light"
                                          onclick="deleteItem({{ $user->id }});" type="button">
                                            <i class="fa fa-trash"></i> </button>
                                        </td> --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
</div>
@endsection

{{-- @section('scripts')
<script>
    function deleteItem(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    console.log('ok');
                    document.getElementById(`form${id}`).submit();
                }
            })
        }
</script>
@endsection --}}