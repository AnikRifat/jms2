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
                                <li class="breadcrumb-item active">Course ladger sheet</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end page title -->
            <div class="row mt-3">

                <div class="col-sm-4">
                    <div class="mb-3">
                        <label for="filterTeacher" class="form-label">Filter by Teacher</label>
                        <select id="filterTeacher" class="form-select">
                            <option value="0">All Teachers</option>
                            @foreach ($teachers as $t)
                            <option value="{{ $t->id }}">{{ $t->name }}</option>
                            @endforeach
                            <!-- Add options for teachers here -->
                        </select>
                    </div>
                </div>
                <div class="col-sm-12">
                    <button id="filterButton" class="btn btn-primary">Filter</button>
                </div>
            </div>

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
                                <!-- Update the table body to an empty tbody -->
                                <tbody id="filteredData">
                                    @foreach ($transactions as $transaction)
                                    <tr>
                                        <td>{{ $transaction->order->course->title }}</td>
                                        <td>{{ $transaction->transaction_id }}</td>
                                        <td>{{ $transaction->creator->name }}</td>
                                        <td>
                                            {{ $transaction->amount }}

                                        </td>

                                        <td>{{ $transaction->ratio }} %</td>
                                        <td>{{ $transaction->teacher }} $</td>
                                        <td>{{ $transaction->owner }} $</td>
                                        <td>{{ $transaction->created_at->format('d M Y') }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>

                                <!-- Add this script to load data using AJAX -->
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



<!-- ... (your existing code) -->

@section('scripts')
<!-- ... (your existing code) -->

<script>
    $(document).ready(function() {
    // Function to fetch data based on selected filters
    function fetchData() {
        var teacherId = $('#filterTeacher').val();

        // Send AJAX request
        $.ajax({
            url: '{{ url('api/coursefilter') }}',
            type: 'GET',
            data: {
                teacherId: teacherId,
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                // Check if the response is an array
                if (Array.isArray(response)) {
                    updateTable(response);
                } else {
                    console.error('Invalid response format. Expected an array.');
                }
            },
            error: function(error) {
                // Handle error if needed
                console.error('Error occurred during AJAX request:', error);
            }
        });
    }

    // Update the table on page load
    // fetchData();

    // Add event listeners to update the table whenever filters change
    $('#filterButton').click(function() {
        // console.log('ok');
        fetchData();
    });

    function updateTable(data) {
        // Clear the existing table data
        $('#filteredData').empty();

        // Loop through the data and add rows to the table
        data.forEach(function(item) {
            var row = '<tr>';
            row += '<td>' + item.coursetitle + '</td>';
            row += '<td>' + item.transaction_id + '</td>';
            row += '<td>' + item.creator_name + '</td>';
            row += '<td>' + item.amount + '</td>';
            row += '<td>' + item.ratio + ' %</td>';
            row += '<td>' + item.teacher + ' $</td>';
            row += '<td>' + item.owner + ' $</td>';
            row += '<td>' + item.created_at + '</td>';
            row += '</tr>';
            $('#filteredData').append(row);
        });
    }
});

</script>
@endsection

<!-- ... (your existing code) -->