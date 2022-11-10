@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Afdelinger</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                @can('create page')
                    <div class="btn-group me-2">
                        <a href="{{ route('admin.departments.create') }}" class="btn btn-sm btn-outline-primary">Opret ny</a>
                    </div>
                @endcan
            </div>
        </div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Navn</th>
                    <th scope="col">Medlemmer</th>
                    <th scope="col">Oprettet</th>
                    @can('update department' || 'delete department')
                        <th scope="col"></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse ($departments as $department)
                    <tr>
                        <th scope="row">{{ $department->id }}</th>
                        <td>{{ $department->name }}</td>
                        <td>{{ $department->users()->count() }}</td>
                        <td>{{ $department->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                @can('update department')
                                    <a href="{{ route('admin.departments.edit', $department) }}"
                                        class="btn btn-primary me-2">Rediger</a>
                                @endcan
                                @can('delete department')
                                    <form action="{{ route('admin.departments.destroy', $department) }}" method="POST"
                                        onSubmit="return confirm('Er du sikker på du vil slette afdelingen?')">
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
                        <th scope="row">Ingen afdelinger her!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
