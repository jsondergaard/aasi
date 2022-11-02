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
                    @can('update sponsor' || 'delete sponsor')
                        <th scope="col"></th>
                    @endcan
                </tr>
            </thead>
            <tbody>
                @forelse ($sponsors as $sponsor)
                    <tr>
                        <th scope="row">{{ $sponsor->id }}</th>
                        <td>{{ $sponsor->name }}</td>
                        <td>{{ $sponsor->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                @can('update sponsor')
                                    <a href="{{ route('admin.sponsors.update', $sponsor) }}"
                                        class="btn btn-primary me-2">Rediger</a>
                                @endcan
                                @can('delete sponsor')
                                    <form action="{{ route('admin.sponsors.destroy', $sponsor) }}" method="POST"
                                        onSubmit="return confirm('Er du sikker på du vil slette sponsoren?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger me-2">Slet</button>
                                    </form>
                                @endcan
                                @can('create offer')
                                    <form action="{{ route('admin.sponsors.offers.create', $sponsor) }}" method="GET">
                                    @csrf
                                    @method('CREATE')
                                    <button type="submit" class="btn btn-success">Opret kupon</button>
                                  </form>
                                @endcan
                                    
                            </div>
                        </td>
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
