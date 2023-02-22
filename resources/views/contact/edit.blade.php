@extends('layouts.main')

@section('title', 'Editando contato')

@section('content')

<div class="container_edit">
    <header class="header_welcome">
    <a class="link_welcome" href="/"><p class="logo_title">MY Agenda</p></a>
    </header>

    <h3>Editando o contato: {{$contact->name}}</h3>
    <form action="/contatos/atualizar/{{$contact->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form__group field">
            <input class="form__field" type="text" id="name" name="name" placeholder="Nome" value="{{$contact->name}}">
            <label class="edit_label form__label"  for="name">Nome</label>
            <span class="edit_span"></span>
        </div>

        <div class="form__group field">
            <input class="form__field" type="email" id="email" name="email" placeholder="E-mail" value="{{$contact->email}}">
            <label class="edit_label form__label" for="email">E-mail:</label>
            <span class="edit_span"></span>
        </div>

        <div class="form__group field">
            <input class="form__field" type="text" id="number" name="number" placeholder="(00) 0 00000000" value="{{$contact->number}}">
            <label class="edit_label form__label" for="number">Número:</label>
            <span class="edit_span"></span>
        </div>

        <div class="form__group field" id="photo">
            <input class="form__field"  type="file" name="image" id="image" >
            <label class="edit_label form__label" for="image">Adicione sua foto</label>
            <span class="edit_span"></span>
        </div>
        <button class="button_submit" type="submit">Editar contato</button>
    </form>
</div>

@endsection