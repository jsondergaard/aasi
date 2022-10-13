@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Forældre ID</th>
                    <th scope="col">Side</th>
                    <th scope="col">Oprettet</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                    <tr>
                        <th scope="row">{{ $page->id }}</th>
                        <th scope="row"></th>
                        <td>{{ $page->name }}</td>
                        <td>{{ $page->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('admin.pages.edit', $page->slug) }}" class="btn btn-primary">Rediger</a></td>
                    </tr>
                    @foreach ($page->children as $child)
                        <tr>
                            <th scope="row">{{ $child->id }}</th>
                            <th scope="row">{{ $page->id }}</th>
                            <td>{{ $child->name }}</td>
                            <td>{{ $child->created_at->diffForHumans() }}</td>
                            <td><a href="{{ route('admin.pages.edit', $child->slug) }}" class="btn btn-primary">Rediger</a>
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
