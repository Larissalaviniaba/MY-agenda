@extends('layouts.main')

@section('title', 'Adicionar contato')

@section('content')

<div class="container_edit">
    <header class="header_welcome">
        <a href="/"><p class="logo_title">MY Agenda</p></a>
    </header>

    <h3>Adicione um novo contato</h3>
    <form action="/contatos" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form__group field">
            <input class="form__field" type="text" id="name" name="name" placeholder="Nome" require>
            <label class="edit_label form__label"  for="name">Nome</label>
            <span class="edit_span"></span>
        </div>

        <div class="form__group field">
            <input class="form__field" type="email" id="email" name="email" placeholder="E-mail" require>
            <label class="edit_label form__label" for="email">E-mail:</label>
            <span class="edit_span"></span>
        </div>

        <div class="form__group field">
            <input class="form__field" type="text" id="number" name="number" placeholder="(00) 0 00000000" require>
            <label class="edit_label form__label" for="number">Número:</label>
            <span class="edit_span"></span>
        </div>

        <div class="form__group field" id="photo">
            <input class="form__field"  type="file" name="image" id="image" require>
            <label class="edit_label form__label" for="image">Adicione sua foto</label>
            <span class="edit_span"></span>
        </div>
        <button class="button_submit" type="submit">Adicionar contato</button>
    </form>
</div>

@endsection