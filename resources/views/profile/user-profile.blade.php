@extends('layouts.main')
@section('title', 'Perfil')
@section('content')


{{---
    
Aqui ficará as informaçoes e dados do perfil do usuario---}}

{{---

Aqui vai ficar uma validação do tipo:
Se a pessoa que esta acessando o perfil for a dona, entao aparecerá opções extras de modificação.

---}}

@if ($profile != null)
    <h1>perfil de {{$profile}}</h1>
@endif

@endsection