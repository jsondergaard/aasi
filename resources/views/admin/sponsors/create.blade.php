@extends('layouts.app')

@section('main')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('admin.sponsors.store') }}">
                @csrf

                <div class="row mb-3">
                    <label for="name" class="col-md-4 col-form-label text-md-end">Sponsor navn</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}">
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="image" class="col-md-4 col-form-label text-md-end">Vælg logo</label>
                    <div class="col-md-6">
                    <button type="file" id="image" name="image" accept="image/*" class="btn btn-primary">Vælg</button>
                    </div>
                </div>
                
                <div class="row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Create User
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
