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

    <div class="px-5">
        @foreach ($pages as $page)
            <a href={{ $page->slug }} style="text-decoration: none">
                <div class="card" style="width: 18rem;">
                    {{-- <img src="..." class="card-img-top" alt="..."> --}}
                    <div class="card-body">
                        <h5 class="card-title">{{ $page->title }}</h5>
                        <p class="card-text"></p>
                    </div>
                </div>
            </a>
        @endforeach
    </div>

@endsection
