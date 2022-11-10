@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Rediger kupon</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    @can('delete sponsor')
                        <form action="{{ route('admin.sponsors.offers.destroy', [$offer->sponsor, $offer]) }}" method="POST"
                            onSubmit="return confirm('Er du sikker på du vil slette kuponnen?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Slet</button>
                        </form>
                    @endcan
                </div>
            </div>
        </div>

        <form action="{{ route('admin.sponsors.offers.update', [$offer->sponsor, $offer]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Navn</label>
                    <input name="name" class="form-control @error('name') is-invalid @enderror" type="text"
                        id="name" value="{{ old('name', $offer->name) }}">
                </div>

                <div class="col-6">
                    <label for="image" class="form-label">Billede</label>
                    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image"
                        name="image">
                </div>
            </div>
            <div class="row">
                <div class="col-6 mb-3">
                    <label for="name" class="form-label">Beskrivelse</label>
                    <textarea name="description" class="form-control @error('description') is-invalid @enderror" type="text"
                        cols="5" rows="3" id="description">{{ old('description', $offer->description) }}</textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-4">Gem</button>
        </form>
    </div>
@endsection
