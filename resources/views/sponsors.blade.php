@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        @foreach ($sponsors as $sponsor)
            <div class="col-4"><img src="" alt="{{ $sponsor->name }}" /></div>
        @endforeach
    </div>
@endsection
