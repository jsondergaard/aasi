@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="row mb-4">
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Antal brugere</h5>
                        <p class="card-text">{{ \App\Models\User::count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Antal sponsorer</h5>
                        <p class="card-text">{{ \App\Models\Sponsor::count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Antal kuponer</h5>
                        <p class="card-text">{{ \App\Models\Offer::count() }}</p>
                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Brugte kuponer</h5>
                        <p class="card-text">{{ \App\Models\UsedOffer::count() }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h3>Brugte kuponer</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Bruger</th>
                            <th scope="col">Kupon</th>
                            <th scope="col">V/ sponsor</th>
                            <th scope="col">Tidspunkt</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($usedOffers as $usedOffer)
                            <tr>
                                <th scope="row">{{ $usedOffer->user->name }}</th>
                                <td>{{ $usedOffer->offer->name }}
                                <td>{{ $usedOffer->sponsor->name }}</td>
                                <td>{{ $usedOffer->created_at->diffForHumans() }}</td>
                            </tr>
                        @empty
                            <tr>
                                <th scope="row">Ingen brugte kuponer her</th>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <h3>Nyeste brugere</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Bruger</th>
                            <th scope="col">Afdeling</th>
                            <th scope="col">Oprettet</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($latestUsers as $user)
                            <tr>
                                <th scope="row">{{ $user->name }}</th>
                                <th scope="row">{{ $user->listDepartments }}</th>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
