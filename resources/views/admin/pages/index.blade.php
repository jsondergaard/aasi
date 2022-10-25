@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Sider</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                @can('create page')
                    <div class="btn-group me-2">
                        <a href="{{ route('admin.pages.create') }}" class="btn btn-sm btn-outline-primary">Opret ny</a>
                    </div>
                @endcan
            </div>
        </div>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Forældre ID</th>
                    <th scope="col">Side</th>
                    <th scope="col">Oprettet</th>
                    @can('update page')
                        <th scope="col"></th>
                    @endcan
                    @can('delete page')
                        <th scope="col"></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                    <tr>
                        <th scope="row">{{ $page->id }}</th>
                        <th scope="row"></th>
                        <td>{{ $page->name }}</td>
                        <td>{{ $page->created_at->diffForHumans() }}</td>
                        @can('update page')
                            <td><a href="{{ route('admin.pages.edit', $page->slug) }}" class="btn btn-primary">Rediger</a></td>
                        @endcan
                        @can('delete page')
                            <td>
                                @if ($page->children->count() > 0)
                                    <span class="small text-muted">Slet børn først.</span>
                                @else
                                    <form action="{{ route('admin.pages.destroy', $page->slug) }}" method="POST"
                                        onSubmit="return confirm('Er du sikker på du vil slette siden?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Slet</button>
                                    </form>
                                @endif
                            </td>
                        @endcan
                    </tr>
                    @foreach ($page->children as $child)
                        <tr>
                            <th scope="row">{{ $child->id }}</th>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $child->name }}</td>
                            <td>{{ $child->created_at->diffForHumans() }}</td>
                            @can('update page')
                                <td><a href="{{ route('admin.pages.edit', $child->slug) }}" class="btn btn-primary">Rediger</a>
                                @endcan
                                @can('delete page')
                                <td>
                                    <form action="{{ route('admin.pages.destroy', $child->slug) }}" method="POST"
                                        onSubmit="return confirm('Er du sikker på du vil slette siden?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Slet</button>
                                    </form>
                                </td>
                            @endcan
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <th scope="row">Ingen sider her!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
