@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <h1 class="h2">Opret kupon</h1>
        <form action="{{ route('admin.sponsors.offers.store', $sponsor) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-6">
                    <label for="name" class="form-label">Navn</label>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                        name="name" value="{{ old('name') }}">
                </div>

                <div class="col-6">
                    <label for="image" class="form-label">Billede</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image">
                </div>
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Beskrivelse</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary mt-4">
                Gem
            </button>
    </div>
    </form>
    </div>
@endsection
