@extends('layouts.main')

@section('title', $contact->name)

@section('content')
<div>
    <img src="/imgs/contacts/{{$contact->image}}" alt="{{$contact->name}}">
    <h3>{{$contact->name}}</h3>
    <p>{{$contact->number}}</p>
    <p>{{$contact->email}}</p>
    <a href="/contatos/editar/{{$contact->id}}">Editar</a>
    <form action="/contatos/{{$contact->id}}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Deletar contato</button>
    </form>
</div>
@endsection

