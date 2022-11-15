@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        <div class="row">
            @foreach ($sponsors as $sponsor)
                <div class="col-md-6 p-3">
                    <div class="row">
                        <div class="col-md-4">
                            @if ($sponsor->link)
                                <a href="{{ $sponsor->link }}" target="_blank">
                                    <img src="{{ $sponsor->imagePath }}" alt="{{ $sponsor->name }}" style="width:100%;" />
                                </a>
                            @else
                                <img src="{{ $sponsor->imagePath }}" alt="{{ $sponsor->name }}" style="width:100%;" />
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $sponsor->name }}</h3>
                            <p>{{ $sponsor->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
