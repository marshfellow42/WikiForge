<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="dark">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
      <header>
        <nav class="px-11 navbar navbar-expand-lg bg-body-tertiary">
          <div class="container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" height="30px" width="30px">
            <a class="navbar-brand ps-2" href="#">{{ config('app.name', 'Laravel') }}</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="mb-2 navbar-nav me-auto mb-lg-0">
              </ul>
              <form class="d-flex">
                  @if (Route::has('login'))
                      @auth
                          <a
                              href="{{ url('/dashboard') }}"
                              class="nav-link"
                          >
                              Dashboard
                          </a>
                      @else
                              <a
                                  href="/admin/login"
                                  class="px-3 nav-link"
                              >
                                  Log in
                              </a>
                          @if (Route::has('register'))
                              <a
                                  href="/admin/register"
                                  class="nav-link"
                              >
                                  Register
                              </a>
                          @endif
                      @endauth
                  @endif
              </form>
              </div>
            </div>
        </nav>
      </header>

      <main>
        <div class="container">
            @foreach ($pages as $page)
                <div class="my-3 col-md-3">
                    <div class="mb-4 card">
                        <a href="{{ $page->slug }}" style="text-decoration: none; color: inherit;">
                            @php
                                $parsedData = json_decode($page->blocks, true);

                                $parsedTitle = $parsedData[0]['data']['title'] ?? '';

                                $subtitle = $parsedData[0]['data']['subtitle'] ?? '';
                            @endphp
                            <div class="card-body">
                                <h5 class="card-title">{{ $parsedTitle }}</h5>
                                <p> {{ $subtitle }} </p>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
      </main>
    </body>
</html>

