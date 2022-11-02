@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Sponsorer</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                @can('create sponsor')
                    <div class="btn-group me-2">
                        <a href="{{ route('admin.sponsors.create') }}" class="btn btn-sm btn-outline-primary">Opret ny</a>
                    </div>
                @endcan
            </div>
        </div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Sponsor</th>
                    <th scope="col">Oprettet</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sponsors as $sponsor)
                    <tr>
                        <th scope="row">{{ $sponsor->id }}</th>
                        <td>{{ $sponsor->name }}</td>
                        <td>{{ $sponsor->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('admin.sponsors.update', $sponsor) }}" class="btn btn-outline-secondary">Rediger</a></td>
                        <td><a href="{{ route('admin.sponsors.offers.create', $sponsor) }}" class="btn btn-outline-success">Tilføj kupon</a></td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row">Ingen sponsorer her!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
