@extends('layouts.main')
@section('title', 'Pagina Inicial')
@section('content')

@php
    $user_data = session('user_data');
@endphp

@if(!empty($user_data) && isset($user_data['name']))
    <h1>Olá, {{ $user_data['name'] }}</h1>
@else
    <h1>Olá, visitante!</h1>
@endif

@endsection