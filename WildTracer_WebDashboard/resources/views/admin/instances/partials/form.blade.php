@csrf
                        <div class="form-group row">
                            <label for="submitted_by" class="col-md-4 col-form-label text-md-right"><b>{{ __('Submitted By') }}</b></label>

                            <div class="col-md-6">
                            <input id="submitted_by" type="text" class="form-control @error('submitted_by') is-invalid @enderror" name="submitted_by" value="{{ old('submitted_by') }} @isset($instances) {{ $instances->submitted_by }} @endisset" required autocomplete="submitted_by" autofocus >

                                @error('submitted_by')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right"><b>{{ __('Phone Number') }}</b></label>

                            <div class="col-md-6">
                                <input id="mobile" type="number" class="form-control @error('mobile') is-invalid @enderror" name="mobile" value="{{ old('mobile') }} @isset($instances) {{ $instances->mobile}} @endisset" required autocomplete="mobile" placeholder="Enter Phone Number">

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @isset($create)
                        <div class="form-group row">
                            <label for="animal_type" class="col-md-4 col-form-label text-md-right"><b>{{ __('Animal Type') }}</b></label>                       

                        <div class="mb-3"> 
                            @foreach ($animals as $animal)
                            <div class="form-check">
                                <input class="form-check-input" name="animal_type"
                            type="checkbox" value="{{ $animal->name }}" id="animal_type">
                            <label class="form-check-label" for="{{ $animal->name }}">
                            {{ $animal->name }}
                            </label>
                            </div>
                            @endforeach
                        </div>

                        <div class="form-group row">
                        <div class="col">
                            <label for="location" class="col-md-4 col-form-label text-md-right"><b>{{ __('Location') }}</b></label>                       

                        <div class="mb-3"> 
                            @foreach ($locations as $location)
                            <div class="form-check">
                                <input class="form-check-input" name="location"
                            type="checkbox" value="{{ $location->name }}" id="location">
                            <label class="form-check-label" for="{{ $location->name }}">
                            {{ $location->name }}
                            </label>
                            </div>
                            @endforeach
                        </div>
                        </div>

                        <div class="col">
                            <label for="route" class="col-md-4 col-form-label text-md-right"><b>{{ __('Route') }}</b></label>                       

                        <div class="mb-3"> 
                            @foreach ($routes as $route)
                            <div class="form-check">
                                <input class="form-check-input" name="route"
                            type="checkbox" value="{{ $route->name }}" id="route">
                            <label class="form-check-label" for="{{ $route->name }}">
                            {{ $route->name }}
                            </label>
                            </div>
                            @endforeach
                        </div>
                        </div>

                        <div class="form-group row">
                        <div class="col">
                            <label for="month" class="col-md-4 col-form-label text-md-right"><b>{{ __('Month') }}</b></label>  
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="January" id="month">
                            <label class="form-check-label" for="January">
                                January
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="February" id="month">
                            <label class="form-check-label" for="February">
                                February
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="March" id="month">
                            <label class="form-check-label" for="March">
                                March
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="April" id="month">
                            <label class="form-check-label" for="April">
                                April
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="May" id="month">
                            <label class="form-check-label" for="May">
                                May
                            </label>
                            </div>
                        </div>
                        </div>

                        
                        <div class="col">
                        <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="June" id="month">
                            <label class="form-check-label" for="June">
                                June
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="July" id="month">
                            <label class="form-check-label" for="July">
                                July
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="August" id="month">
                            <label class="form-check-label" for="August">
                                August
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="September" id="month">
                            <label class="form-check-label" for="September">
                                September
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="October" id="month">
                            <label class="form-check-label" for="October">
                                October
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="November" id="month">
                            <label class="form-check-label" for="November">
                                November
                            </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" name="month"
                            type="checkbox" value="December" id="month">
                            <label class="form-check-label" for="December">
                                December
                            </label>
                            </div>
                        </div>
                        </div>

                        <div class="form-group row">
                                <label for="year" class="col-md-4 col-form-label text-md-right"><b>{{ __('Year') }}</b></label>
    
                                <div class="col-md-6">
                                <input id="year" type="number" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }} @isset($instances) {{ $instances->year }} @endisset" required autocomplete="year" placeholder="Enter Year" >
    
                                    @error('year')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                        </div>

                        {{-- <div class="row">
                                <div class="col">
                                  <label class="small mb-1" for="gps_latitude"><b>GPS Latitude</b></label>
                                  <input class="form-control py-2" type="text" placeholder="Enter GPS Latitude" name="gps_latitude">
                                </div>
                                <div class="col">
                                  <label class="small mb-1" for="gps_longitude"><b>GPS Longitude</b></label>
                                  <input class="form-control py-2" type="text" placeholder="Enter GPS Longitude" name="gps_longitude">
                                </div>
                        </div> --}}
                        
                        @endisset
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                <b>   {{ __('Submit') }}</b>
                                </button>
                            </div>
                        </div>