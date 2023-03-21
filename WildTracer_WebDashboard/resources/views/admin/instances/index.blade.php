@extends('layouts.app')

@section('stylesheet')
<link rel="stylesheet" href="{{ asset('assets/vendors/simple-datatables/style.css') }}">
@endsection

@section('content')
<header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Instances</h3>
                    <p class="text-subtitle text-muted">List of instances</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <a class="btn btn-sm btn-success float-right" href="{{ route('admin.instances.create') }}" role="button">Create New Instances</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Instances Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                            <thead>
                                    <tr>
                                    <th scope="col">Instance Id</th>
                                    {{-- <th scope="col">File</th> --}}
                                    {{-- <th scope="col">GPS Latitude</th>
                                    <th scope="col">GPS Longitude</th> --}}
                                    <th scope="col">Animal Type</th>
                                    <th scope="col">Location</th>
                                    <th scope="col">Month</th>
                                    <th scope="col">Year</th>
                                    <th scope="col">Submitted By</th>
                                    <th scope="col">Mobile No.</th>
                                    <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($instances as $instance)
                                    <tr>
                                    <th scope="row">{{ $instance->id }}</th>
                                    {{-- <td>{{ $instance->file }}</td> --}}
                                    {{-- <td>{{ $instance->gps_latitude}}</td>
                                    <td>{{ $instance->gps_longitude}}</td> --}}
                                    <td>{{ $instance->animal_type }}</td>
                                    <td>{{ $instance->location }}</td>
                                    <td>{{ $instance->month }}</td>
                                    <td>{{ $instance->year }}</td>
                                    <td>{{ $instance->submitted_by }}</td>
                                    <td>{{ $instance->mobile }}</td>
                                    <td>
                                        <form id="delete-instance-form-{{ $instance->id }}" action="{{ route('admin.instances.destroy', $instance->id) }}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure? Record will be deleted.')">Delete</button>
                                        </form>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>

        </section>
    </div>
@endsection

@section('script')
<script src="{{ asset('assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
<script>
    let table1 = document.querySelector('#table1');
    let dataTable = new simpleDatatables.DataTable(table1);
</script>
@endsection