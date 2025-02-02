@extends('layouts.main')
@section('title', 'Página Inicial')
@section('content')

@auth
    <h1 style="text-align: center">Olá, {{ Auth::user()->nickname }}</h1>
{{--
    <x-markdown>
        {!! $markdown !!}
    </x-markdown>
--}}

@endauth

@guest
    <h1 style="text-align: center">Olá, visitante!</h1>
@endguest

@endsection
