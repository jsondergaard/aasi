@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <h1>Kuponer</h1>
        <div class="row">
            @foreach ($offers as $offer)
                <div class="col-md-6 g-4">
                    <a href="{{ route('offers.view', $offer) }}" class="text-decoration-none text-white">
                        <div class="card shadow-sm"
                            style="background-image: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.6)), url({{ $offer->image }});">
                            <!-- Pills hvis der skal markater -->
                            <div class="card-body">
                                <span class="badge rounded-pill text-bg-light">Brugt</span>
                                <h3 class="mt-5">{{ $offer->name }}</h3>
                                <p class="card-text">{{ $offer->description }}</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
