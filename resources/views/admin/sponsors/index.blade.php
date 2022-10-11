@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <table class="table">
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
                        <td><a href="#" class="btn btn-primary">Se mere</a></td>
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
