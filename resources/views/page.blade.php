@extends('layouts.app')

@section('main')
    {!! Blade::render(\GrahamCampbell\Markdown\Facades\Markdown::convert($page->content)->getContent()) !!}
@endsection
