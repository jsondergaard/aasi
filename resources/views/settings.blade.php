@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-sm-12">
                <div class="card">
                    <div class="card-header">Indstillinger</div>

                    <div class="card-body">
                        <form action="{{ route('users.settings.update') }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="email" class="form-label">Email addresse</label>
                                    <input name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" id="email"
                                        value="{{ old('email', auth()->user()->email) }}">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="name" class="form-label">Navn</label>
                                    <input name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" id="name"
                                        value="{{ old('name', auth()->user()->name) }}">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-6">
                                    <label for="password" class="form-label">Ny adgangskode</label>
                                    <input name="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" id="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="password_confirmation" class="form-label">Bekræft adgangskode</label>
                                    <input name="password_confirmation" type="password"
                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                        id="password_confirmation">

                                    @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Gem</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
