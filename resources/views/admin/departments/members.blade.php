@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Medlemmer</h1>
        </div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Navn</th>
                    <th scope="col">Medlem siden</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($members as $member)
                    <tr>
                        <th scope="row">{{ $member->id }}</th>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->departments()->find($department)->pivot->created_at->diffForHumans() }}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <th scope="row">Ingen medlemmer her!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
