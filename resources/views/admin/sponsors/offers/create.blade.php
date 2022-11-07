@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <h1 class="h2">Opret Kupon</h1>
        <form action="{{ route('admin.sponsors.offers.store', $sponsor) }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name">Navn</label>

                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="description">Beskrivelse</label>

                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="10">{{ old('description') }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <button type="submit" class="btn btn-primary">
                        Gem
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
