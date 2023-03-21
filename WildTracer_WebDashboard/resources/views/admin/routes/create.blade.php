@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new route') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.routes.store') }}">                       
                        @include('admin.routes.partials.form', ['create' => true])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
