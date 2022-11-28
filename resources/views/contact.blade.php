@extends('layouts.app')


@section('main')
    <div class="container mt-4">
        <form action="{{ route('contact.send') }}" method="post">
            @csrf

            <div class="col-12">
                <h1>Kontakt os</h1>

                <div class="row mb-3">
                    <div class="col-6">
                        <label for="name">Navn</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" value="{{ old('name') }}" required>

                        @if ($errors->has('name'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="col-6">
                        <label for="department">Afdeling</label>
                        <select class="form-select @error('department') is-invalid @enderror" id="department"
                            name="department" required>
                            <option disabled>Vælg afdeling</option>
                            <option value="badmintonformand"
                                {{ old('department') == 'badmintonformand' ? 'selected' : '' }}>Badminton
                            </option>
                            <option value="fodboldformand" {{ old('department') == 'fodboldformand' ? 'selected' : '' }}>
                                Fodbold</option>
                            <option value="haandboldformand"
                                {{ old('department') == 'haandboldformand' ? 'selected' : '' }}>Håndbold
                            </option>
                            <option value="svomningformand" {{ old('department') == 'svomningformand' ? 'selected' : '' }}>
                                Svømning
                            </option>
                            <option value="volleyformand" {{ old('department') == 'volleyformand' ? 'selected' : '' }}>
                                Volley</option>
                            <option value="formand" {{ old('department') == 'formand' ? 'selected' : '' }}>Andet</option>
                        </select>

                        @if ($errors->has('department'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('department') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" required>

                            @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="subject">Emne</label>
                        <input type="text" class="form-control @error('subject') is-invalid @enderror" id="subject"
                            name="subject" value="{{ old('subject') }}" required>

                        @if ($errors->has('subject'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('subject') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-12">
                        <label for="message">Besked</label>
                        <textarea class="form-control @error('message') is-invalid @enderror" id="message" rows="5" name="message"
                            required>{{ old('message') }}</textarea>

                        @if ($errors->has('message'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('message') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">
                    Send
                </button>
            </div>
        </form>
    </div>
@endsection
