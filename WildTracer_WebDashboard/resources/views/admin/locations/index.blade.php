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
                    <h3>Locations</h3>
                    <p class="text-subtitle text-muted">For locations to check the list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li> --}}
                            <a class="btn btn-sm btn-success float-right" href="{{ route('admin.locations.create') }}" role="button">Add New Location</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Locations Datatable
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                            <thead>
                                <tr>
                                <th scope="col">#Id</th>
                                <th scope="col">Name</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($locations as $location)
                                <tr>
                                <th scope="row">{{ $location->id }}</th>
                                <td>{{ $location->name }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.locations.edit', $location->id) }}" role="button">Edit</a>
                                </td>
                                <td>
                                    <form id="delete-location-form-{{ $location->id }}" action="{{ route('admin.locations.destroy', $location->id) }}" method="POST">
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