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
                    <th scope="col">ID</th>
                    <th scope="col">Tilhører</th>
                    <th scope="col">Billede</th>
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
                        <td> </td>
                        <td><img src="{{ $sponsor->thumbnailPath }}" style="object-fit: cover;" height="32"
                                width="32" /></td>
                        <td>{{ $sponsor->name }}</td>
                        <td>{{ $sponsor->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="d-flex justify-content-end">
                                @can('create offer')
                                    <form action="{{ route('admin.sponsors.offers.create', $sponsor) }}" method="GET">
                                        @csrf
                                        @method('CREATE')
                                        <button type="submit" class="btn btn-success me-2">Opret kupon</button>
                                    </form>
                                @endcan
                                @can('update sponsor')
                                    <a href="{{ route('admin.sponsors.edit', $sponsor) }}"
                                        class="btn btn-primary me-2">Rediger</a>
                                @endcan
                                @can('delete sponsor')
                                    @if ($sponsor->offers->count() > 0)
                                        <button class="btn btn-outline-danger">Slet</button>
                                    @else
                                        <form action="{{ route('admin.sponsors.destroy', $sponsor) }}" method="POST"
                                            onSubmit="return confirm('Er du sikker på du vil slette sponsoren?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Slet</button>
                                        </form>
                                    @endif
                                @endcan

                            </div>
                        </td>
                    </tr>
                    @foreach ($sponsor->offers as $offer)
                        <tr class="table-info">
                            <th scope="row">{{ $offer->id }}</th>
                            <th scope="row">{{ $sponsor->id }}</th>
                            <th scope="row"><img src="{{ $offer->thumbnailPath }}" style="object-fit: cover;"
                                    height="32" width="32" /></th>
                            <td>{{ $offer->name }}</td>
                            <td>{{ $offer->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="d-flex justify-content-end">
                                    @can('update offer')
                                        <a href="{{ route('admin.sponsors.offers.edit', [$sponsor, $offer]) }}"
                                            class="btn btn-primary me-2">Rediger</a>
                                    @endcan
                                    @can('delete offer')
                                        <form action="{{ route('admin.sponsors.offers.destroy', [$sponsor, $offer]) }}"
                                            method="POST" onSubmit="return confirm('Er du sikker på du vil slette kuponnen?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Slet</button>
                                        </form>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @empty
                    <tr>
                        <th scope="row">Ingen sponsorer her!</th>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
