@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Roller</h1>
            @can('create user')
                <div class="btn-toolbar mb-2 mb-md-0">
                    <div class="btn-group me-2">
                        <a href="{{ route('admin.roles.create') }}" class="btn btn-sm btn-outline-primary">Opret ny</a>
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
                @forelse ($roles as $role)
                    <tr>
                        <th scope="row">{{ $role->id }}</th>
                        <th scope="row">{{ $role->name }}</th>
                        @can('update role')
                            <td><a href="{{ route('admin.roles.edit', $role) }}" class="btn btn-primary">Rediger</a>
                            @endcan
                            @can('delete role')
                            <td>
                                <form action="{{ route('admin.roles.destroy', $role) }}" method="POST"
                                    onSubmit="return confirm('Er du sikker på du vil slette rollen?')">
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
