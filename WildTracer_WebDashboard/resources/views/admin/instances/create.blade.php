@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><b>{{ __('Create new instances') }}</b></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.instances.store') }}">                       
                        @include('admin.instances.partials.form', ['create' => true])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
