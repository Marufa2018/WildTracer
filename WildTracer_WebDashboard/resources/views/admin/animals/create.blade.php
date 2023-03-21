@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create new animal') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.animals.store') }}">                       
                        @include('admin.animals.partials.form', ['create' => true])
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
