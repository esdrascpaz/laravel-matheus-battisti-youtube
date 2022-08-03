{{-- Chamando o arquivo "main" na pasta "layouts" --}}
@extends('layouts.main')

{{-- Chamando o elemento "title" criado no arquivo "main",
passando um texto como parâmetro para o título --}}
@section('title', 'Página inicial')

{{-- Passando o body --}}
@section('contentBody')
    {{-- <br><h1>Página inicial</h1><br> --}}

    <div id="search-container" class="col-md-12">
        <h1>Busque um evento</h1>
        <form action="">
            <input 
                type="text" 
                id="search" 
                name="search" 
                class="form-control" 
                placeholder="procurar..."
            >
        </form>
    </div>
    <div id="container-eventos" class="col-md-12">
        <h2>Próximos eventos</h2>
        <p class="subtitulo">Veja os eventos dos próximos dias</p>
        <div id="cards-container" class="row">
            @foreach ($eventos as $evento)
                <div class="card col-md-3">
                    {{-- NÃO ESTÁ FUNCIONANDO !!! --}}
                    <img src="/storage/app/public/events/{{ $evento->image }}" alt="{{ $evento->title }}">
                    <div class="card-date">27/05/2022</div>
                    <h5> {{ $evento->título }} </h5>
                    <p class="card-participantes">X Participantes</p>
                    <a href="/events/{{ $evento->id }}" class="btn btn-primary">Saber mais</a>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Fim da section "contentBody" --}}
@endsection
