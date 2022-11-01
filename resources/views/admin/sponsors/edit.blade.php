@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $sponsor->name }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ route('admin.sponsors.destroy', $sponsor) }}" class="btn btn-sm btn-outline-danger">Slet</a>
                </div>
            </div>
        </div>
        <form action="{{ route('admin.sponsors.update', $sponsor) }}" method="POST">
            @csrf
            @method('PATCH')

            <div class="col-6 mb-3">
                <label for="name" class="form-label">Navn</label>
                <input name="name" class="form-control @error('name') is-invalid @enderror" type="text" id="name"
                    value="{{ old('name', $sponsor->name) }}">
            </div>
            <div class="col-6 mb-3">
                <label for="name" class="form-label">Beskrivelse</label>
                <textarea name="description" class="form-control @error('description') is-invalid @enderror" type="text" cols="5"
                    rows="3" id="description">{{ old('description', $sponsor->description) }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gem</button>
        </form>
    </div>
@endsection
