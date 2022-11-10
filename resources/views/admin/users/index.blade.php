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
        <table class="table table-borderless" id="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Navn</th>
                    <th scope="col">Email</th>
                    <th scope="col">Oprettet</th>
                    <th scope="col"></th>
                    @can('update user' || 'delete user')
                        <th scope="col"></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $user)
                    <tr>
                        <th scope="row">{{ $user->id }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                @can('update user')
                                    <a href="{{ route('admin.users.edit', $user) }}" class="btn btn-primary me-2">Rediger</a>
                                @endcan
                                @can('delete user')
                                    <form action="{{ route('admin.users.destroy', $user) }}" method="POST"
                                        onSubmit="return confirm('Er du sikker på du vil slette brugeren?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Slet</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
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

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endpush

@push('stylesheets')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endpush
