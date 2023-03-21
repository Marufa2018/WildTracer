@csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }} @isset($animal) {{ $animal->name }} @endisset" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="scientific_name" class="col-md-4 col-form-label text-md-right">{{ __('Scientific Name') }}</label>

                            <div class="col-md-6">
                            <input id="scientific_name" type="text" class="form-control @error('scientific_name') is-invalid @enderror" name="scientific_name" value="{{ old('scientific_name') }} @isset($animal) {{ $animal->scientific_name }} @endisset" required autocomplete="scientific_name" autofocus>

                                @error('scientific_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="average_lifespan" class="col-md-4 col-form-label text-md-right">{{ __('Average Lifespan') }}</label>

                            <div class="col-md-6">
                            <input id="average_lifespan" type="text" class="form-control @error('average_lifespan') is-invalid @enderror" name="average_lifespan" value="{{ old('average_lifespan') }} @isset($animal) {{ $animal->average_lifespan }} @endisset" required autocomplete="average_lifespan" autofocus>

                                @error('average_lifespan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Submit') }}
                                </button>
                            </div>
                        </div>