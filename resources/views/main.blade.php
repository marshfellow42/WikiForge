@extends('layouts.main')
@section('title', config('app.name', 'Página Inicial'))
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

    <div class="container px-5">
        <div class="row">
            @foreach ($pages as $page)
                <div class="col-md-3">  <!-- Ensures 4 cards per row -->
                    <div class="card mb-4" style="width: 100%;"> <!-- Removed fixed width, let Bootstrap handle it -->
                        <a href="{{ $page->slug }}" style="text-decoration: none" class="text-white">
                            @if (!empty($page->image))
                                <img src="{{ asset('storage/' . $page->image) }}" class="card-img-top" alt="Wiki Image">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $page->title }}</h5>
                                @if (!empty($page->subtitle))
                                    <p class="card-text">{{ $page->subtitle }}</p>
                                @endif
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
