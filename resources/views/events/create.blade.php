@extends('layouts.main')

@section('title', 'Crie um evento')

@section('contentBody')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie um evento</h1>
        <!--"enctype": Necessário para enviar arquivos via formulário HTML-->
        <form action="/events" method="POST" enctype="multipart/form-data">
            {{-- Necessário essa diretiva (?) para
            permitir a submissão do formulário --}}
            @csrf
            <div class="form-group">
                <label for="image">Imagem do Evento: </label>
                <input 
                    type="file" 
                    class="form-control-file" 
                    id="image" 
                    name="image" 
                >
            </div>
            <div class="form-group">
                <label for="title">Evento: </label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="title" 
                    name="title" 
                    placeholder="Nome do evento">
            </div>
            <div class="form-group">
                <label for="title">Cidade: </label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="cidade" 
                    name="cidade" 
                    placeholder="Nome da cidade">
            </div>
            <div class="form-group">
                <label for="title">Evento privado ? </label>
                <select name="private" id="private" class="form-control">
                    <option value="0">Não</option>
                    <option value="1">Sim</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Descrição: </label>
                <textarea
                    name="description" 
                    id="description" 
                    class="form-control"
                    placeholder="O que vai acontecer no evento"
                >
                </textarea>
                <input type="submit" value="Criar evento" class="btn btn-primary">
            </div>
        </form>
    </div>
@endsection