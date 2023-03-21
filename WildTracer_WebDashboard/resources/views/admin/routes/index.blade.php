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
                    <h3>Routes</h3>
                    <p class="text-subtitle text-muted">For routes to check the list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            {{-- <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable</li> --}}
                            <a class="btn btn-sm btn-success float-right" href="{{ route('admin.routes.create') }}" role="button">Add New route</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    Routes Datatable
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
                            @foreach($routes as $route)
                                <tr>
                                <th scope="row">{{ $route->id }}</th>
                                <td>{{ $route->name }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('admin.routes.edit', $route->id) }}" role="button">Edit</a>
                                </td>
                                <td>
                                    <form id="delete-route-form-{{ $route->id }}" action="{{ route('admin.routes.destroy', $route->id) }}" method="POST">
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