@extends('admin.layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">{{ $sponsor->name }}</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <div class="btn-group me-2">
                    <a href="{{ route('admin.sponsors.destroy', $sponsor) }}" class="btn btn-sm btn-outline-danger">Slet</a>
                </div>
            </div>
        </div>

        {{ $sponsor }}
    </div>
@endsection
