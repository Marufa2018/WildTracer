@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update animal') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.animals.update', $animal->id) }}">
                        @method('PATCH') 
                        @include('admin.animals.partials.form')
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
