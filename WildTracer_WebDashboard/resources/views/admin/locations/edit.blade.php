@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update location') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.locations.update', $location->id) }}">
                        @method('PATCH') 
                        @include('admin.locations.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
