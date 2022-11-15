@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <h1 class="mb-4">Kuponer</h1>
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @foreach ($offers as $offer)
                <div class="col">
                    <a href="{{ route('offers.view', $offer) }}" class="text-white">
                        <div class="card shadow h-100"
                            style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(1, 21, 56, 0.8)), url({{ $offer->thumbnailPath }}); background-size:cover;background-position:center;">
                            <div class="card-body">
                                @if (auth()->user()->usedOffer($offer))
                                    <span class="badge rounded-pill text-bg-primary">Brugt</span>
                                @endif
                                <h4 class="card-title @if (auth()->user()->usedOffer($offer)) mt-4 @else mt-5 @endif">
                                    {{ $offer->name }}
                                </h4>
                                <p class="card-text">{{ $offer->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
