@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="row">
            @foreach ($sponsors as $sponsor)
                <div class="col-md-4"><img src="{{ $sponsor->imagePath }}" alt="{{ $sponsor->name }}" style="width:100%;" />
                </div>
            @endforeach
        </div>
    </div>
@endsection
