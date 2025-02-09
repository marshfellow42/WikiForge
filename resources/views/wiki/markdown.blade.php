@extends('layouts.main')
@section('title', $link->title)
@section('content')

    <x-markdown>
        {!! Str::markdown($link->markdown) !!}
    </x-markdown>

@endsection
