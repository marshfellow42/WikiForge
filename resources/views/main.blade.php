@extends('layouts.main')
@section('title', 'Página Inicial')
@section('content')

@auth
    <h1>Olá, {{ Auth::user()->nickname }}</h1>
@endauth
@guest
    <h1>Olá, visitante!</h1>
@endguest

@endsection
