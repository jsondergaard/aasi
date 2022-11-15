@extends('layouts.app')

@section('main')
    <div class="mt-4">
        {!! Blade::render(\GrahamCampbell\Markdown\Facades\Markdown::convert($page->markdown)->getContent()) !!}
    </div>
@endsection
