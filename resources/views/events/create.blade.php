@extends('layouts.main')

@section('title', 'Crie um evento')

@section('contentBody')
    <div id="event-create-container" class="col-md-6 offset-md-3">
        <h1>Crie um evento</h1>
        <!--"enctype": Necessário para enviar arquivos via formulário HTML-->
        <form action="/events" method="POST" enctype="multipart/form-data">
            {{-- Foi criada a migration "2022_09_09_133653_add_field_to_events_table"
            para o envio do path dessa imagem no banco --}}

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
                <label for="date">Data do evento: </label>
                <input 
                    type="date" 
                    class="form-control" 
                    id="date" 
                    name="date" 
                    placeholder="Data do evento">
            </div>
            <div class="form-group">
                <label for="title">Cidade: </label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="city" 
                    name="city" 
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
            <div class="form-group">
                <label for="title">Adicione itens de infraestrutura: </label>
                {{-- A migration add_items_to_events_table foi criada para receber os itens[]
                em "name" --}}
                <div class="form-group">
                    {{-- A propriedade em name precisa estar com chaves para enviar
                    mais de um item no input --}}
                    <input type="checkbox" name="items[]" value="Cadeiras" id=""> Cadeiras
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Palco" id=""> Palco
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Cerveja grátis" id=""> Cerveja grátis
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Open food" id=""> Open food
                </div>
                <div class="form-group">
                    <input type="checkbox" name="items[]" value="Brindes" id=""> Brindes
                </div>
            </div>
        </form>
    </div>
@endsection