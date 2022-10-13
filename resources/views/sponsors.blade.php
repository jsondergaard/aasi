@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        @foreach ($sponsors as $sponsor)
            {{ $sponsor->name }}
        @endforeach
    </div>
@endsection
