@extends('layouts.main')
@section('title', 'Pagina Inicial')
@section('content')

@auth
    <h1>Olá</h1>
@endauth
@guest
    <h1>Olá, visitante!</h1>
@endguest

@endsection