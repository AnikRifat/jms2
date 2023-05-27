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
                        <h4 class="mb-sm-0 font-size-18">Transactions</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">Dashboards</li>
                                <li class="breadcrumb-item active">Transactions</li>
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

                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Course Name</th>
                                        <th>Transaction ID</th>
                                        <th>Teacher Name</th>
                                        <th>Amount</th>
                                        <th>Ratio</th>
                                        <th>Teacher</th>
                                        <th>Owner</th>
                                        <th>Created At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->order->course->title }}</td>
                                        <td>{{ $transaction->transaction_id }}</td>
                                        <td>{{ $transaction->creator->name }}</td>
                                        <td>
                                            {{ $transaction->amount }}

                                        </td>
                                        {{-- @if ($transaction->type == 1)
                                        <td><span class="badge badge-soft-info">Course</span></td>
                                        @else
                                        <td><span class="badge badge-soft-warning">Product</span></td>
                                        @endif --}}

                                        {{-- <td>
                                            @if ($transaction->status == 1)
                                            <span
                                              class="badge rounded-pill badge-soft-success font-size-11">Active</span>
                                            @elseif ($transaction->status == 2)
                                            <span class="badge rounded-pill badge-soft-dark font-size-11">Pending</span>
                                            @else
                                            <span
                                              class="badge rounded-pill badge-soft-danger font-size-11">Inactive</span>
                                            @endif
                                        </td> --}}
                                        <td>{{ $transaction->ratio }} %</td>
                                        <td>{{ $transaction->teacher }} $</td>
                                        <td>{{ $transaction->owner }} $</td>
                                        <td>{{ $transaction->created_at->format('d M Y') }}</td>

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