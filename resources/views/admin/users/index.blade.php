@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Brugere</h1>
            @can('create user')
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="{{ route('admin.users.create') }}" class="btn btn-sm btn-outline-primary">Opret ny</a>
                    </div>
                </div>
            @endcan
        </div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    @can('update user')
                        <th scope="col"></th>
                    @endcan
                    @can('delete user')
                        <th scope="col"></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <th scope="row">{{ $user->name }}</th>
                        <th scope="row">{{ $user->email }}</th>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        @can('update user')
                            <td><a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary">Rediger</a>
                            @endcan
                            @can('delete user')
                            <td>
                                <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                    onSubmit="return confirm('Er du sikker på du vil slette siden?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Slet</button>
                                </form>
                            </td>
                        @endcan
                    </tr>
                @empty
                    <tr>
                        <th scope="row">Ingen brugere her!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
