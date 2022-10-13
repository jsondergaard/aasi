@extends('layouts.app')

@section('main')
    <div class="container mt-4">
        {!! \GrahamCampbell\Markdown\Facades\Markdown::convert($page->markdown)->getContent() !!}
    </div>
@endsection
