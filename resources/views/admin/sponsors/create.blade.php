@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Opret sponsor</h1>
        </div>
        <form action="{{ route('admin.sponsors.store') }}" method="POST">
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
                        Gem sponsor
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
