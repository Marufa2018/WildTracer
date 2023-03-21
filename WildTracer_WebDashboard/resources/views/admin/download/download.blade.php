@extends('layouts.app')

@section('stylesheet')
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="{{ asset('assets/css/download.css') }}">
@endsection

@section('content')
<div class="s007">
    <form>
        <div class="inner-form">
            <div class="advance-search">
                <span class="desc"><h3>Advanced Download</h3></span>
                <div class="row">
                    <div class="input-field">
                        <div class="input-select">
                            <select data-trigger="" name="choices-single-defaul">
                                <option placeholder="" value="">LOCATION</option>
                                <option>LOCATION</option>
                                <option>SUBJECT B</option>
                                <option>SUBJECT C</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-field">
                        <div class="input-select">
                            <select data-trigger="" name="choices-single-defaul">
                                <option placeholder="" value="">ANIMAL TYPE</option>
                                <option>ANIMAL TYPE</option>
                                <option>SUBJECT B</option>
                                <option>SUBJECT C</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-field">
                        <div class="input-select">
                            <select data-trigger="" name="choices-single-defaul">
                                <option placeholder="" value="">MONTH</option>
                                <option>MONTH</option>
                                <option>SUBJECT B</option>
                                <option>SUBJECT C</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row second">
                    <div class="input-field">
                        <div class="input-select">
                            <select data-trigger="" name="choices-single-defaul">
                                <option placeholder="" value="">YEAR</option>
                                <option>YEAR</option>
                                <option>SUBJECT B</option>
                                <option>SUBJECT C</option>
                            </select>
                        </div>
                    </div>
                    {{-- <div class="input-field">
                        <div class="input-select">
                            <select data-trigger="" name="choices-single-defaul">
                                <option placeholder="" value="">TIME</option>
                                <option>THIS WEEK</option>
                                <option>SUBJECT B</option>
                                <option>SUBJECT C</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-field">
                        <div class="input-select">
                            <select data-trigger="" name="choices-single-defaul">
                                <option placeholder="" value="">TYPE</option>
                                <option>TYPE</option>
                                <option>SUBJECT B</option>
                                <option>SUBJECT C</option>
                            </select>
                        </div>
                    </div>
                </div> --}}
                <div class="row third">
                    <div class="input-field">
                        <button class="btn-search">Download</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('script')
@endsection