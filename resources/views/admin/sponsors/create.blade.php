@extends('layouts.app')

@section('main')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="POST" action="{{ route('admin.sponsors.store') }}">
                @csrf

                <div class="row mb-3">
                    <label for="SponsorName" class="col-md-4 col-form-label text-md-end">Sponsor Name</label>

                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                            name="name" value="{{ old('name') }}">
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="img" class="col-md-4 col-form-label text-md-end">Vælg Sponsoricon</label>
                    <div class="col-md-6">
                    <button type="file" id="img" name="img" accept="image/*" class="btn btn-primary">Vælg</button>
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