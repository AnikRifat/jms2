@extends('admin.app.app')
@section('main-content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Edit Package</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">package</a></li>
                                    <li class="breadcrumb-item active">Edit Package</li>
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
                                <form method="POST" action="{{ route('packages.update', $package->id) }}"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="order" class="form-label">Item Order</label>
                                            <input type="text" class="form-control" id="order"
                                                value="{{ $package->order }}" name="order" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="title" class="form-label">Title</label>
                                            <input type="text" class="form-control" id="title" name="title"
                                                value="{{ $package->title }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="subtitle" class="form-label">Subtitle</label>
                                            <input type="text" class="form-control" id="subtitle" name="subtitle"
                                                value="{{ $package->subtitle }}" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="description" class="form-label">Description</label>
                                            <textarea class="form-control" id="summernote" name="description" rows="5">
                                        {!! $package->description !!}
                                    </textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="itinerary" class="form-label">Itinerary</label>
                                            <textarea class="form-control" id="summernote" name="itinerary" rows="5">
                                        {!! $package->itinerary !!}
                                    </textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="notes_policy" class="form-label"> Notes & Policy</label>
                                            <textarea class="form-control" id="summernote" name="notes_policy" rows="5">
                                        {!! $package->notes_policy !!}
                                    </textarea>
                                        </div>
                                        <div class="col-md-12">
                                            <label for="packages_pricing" class="form-label">pricing</label>
                                            <textarea class="form-control" id="summernote" name="packages_pricing" rows="5">
                                        {!! $package->packages_pricing !!}
                                    </textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="price" class="form-label">Price</label>
                                            <div class="input-group">
                                                <span class="input-group-text">$</span>
                                                <input type="number" class="form-control" id="price" name="price"
                                                    value="{{ $package->price }}" required>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <label for="duration" class="form-label">Duration (in days)</label>
                                            <input type="text" class="form-control" id="duration" name="duration"
                                                value="{{ $package->duration }}" required>
                                        </div>


                                        <div class="col-md-4">
                                            <label for="check_in" class="form-label">Check In</label>
                                            <input type="date" class="form-control" id="check_in" name="check_in"
                                                value="{{ $package->check_in }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="check_out" class="form-label">Check Out</label>
                                            <input type="date" class="form-control" id="check_out" name="check_out"
                                                value="{{ $package->check_out }}" required>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="tour_map" class="form-label">Tour Map</label>
                                            <input type="text" class="form-control" id="tour_map" name="tour_map"
                                                value="{{ $package->tour_map }}" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="destination" class="form-label">Destination :</label>
                                            <select id="destination" name="destination_id" class="form-select">

                                                <option selected="">Choose...</option>
                                                @foreach ($destinations as $destination)
                                                    <option value="{{ $destination->id }}"
                                                        @if ($package->destination_id == $destination->id) selected @endif>
                                                        {{ $destination->title }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="service" class="form-label">Under Service of :</label>
                                            <select id="service" name="service_id" class="form-select">

                                                <option selected="">Choose...</option>
                                                @foreach ($services as $service)
                                                    <option value="{{ $service->id }}"
                                                        @if ($package->service_id == $service->id) selected @endif>
                                                        {{ $service->title }}
                                                    </option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="image" class="form-label">Image</label>
                                            <input type="file" class="form-control dropify" id="image"
                                                name="image"
                                                data-default-file="{{ asset('uploads/packages/' . $package->image) }}">
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

            </div> <!-- container-fluid -->
        </div> <!-- page-content -->


        {{-- </div> --}}
    @endsection
