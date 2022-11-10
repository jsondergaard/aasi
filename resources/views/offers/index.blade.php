@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <h1>Kuponer</h1>
        <div class="row">
            @foreach ($offers as $offer)
                <div class="col-lg-4 col-sm-6 g-4">
                    <a href="{{ route('offers.view', $offer) }}" class="text-decoration-none text-white">
                        <div class="card shadow-sm"
                            style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)), url({{ $offer->thumbnailPath }}); background-size:cover;background-position:center;">
                            <div class="card-body">
                                @if (auth()->user()->usedOffer($offer))
                                    <span class="badge rounded-pill text-bg-primary">Brugt</span>
                                @endif
                                <h3 class="@if (auth()->user()->usedOffer($offer)) mt-4 @else mt-5 @endif">{{ $offer->name }}</h3>
                                <p class="card-text">{{ $offer->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
