@extends('layouts.main')

@section('title', 'Agenda Telefônica')

@section('content')

    <div class="container_welcome">
        <header class="header_welcome">
            <p class="logo_title">MY Agenda</p>
        </header>

        <form action="/" class="form_search">
            <input class="input_search" type="text" name="search" id="search" placeholder="Buscar">
            <button class="button_search" type="submit"><i class="ph-magnifying-glass ph-lg hover"></i></button>
        </form>

        <a class="link_add hover" href="/contatos/adicionar">
            <i class="ph-user-circle-plus ph-xl hover"></i>
            <p class="title_add">Adicionar contato</p>
        </a>

        <div class="card_contatc">
        
        <section class="section_contacts">
            <h3 class="title_contact">Contatos</h3>
            @if($search && count($contacts) != 0)
                <h2>Buscando por: {{$search}}</h2>
                <a href="/">ver todos os contatos</a>
            @endif
            <div class="list_contact">
                @foreach($contacts as $contact)
                    <a class="contact_link" href="javascript:get_data_contact({{$contact->id}})">
                    <div class="contact hover">
                        <img class="contact_img" src="/imgs/contacts/{{$contact->image}}" alt="{{$contact -> name}}">
                        <p class="contact_name">{{$contact -> name}}</p>
                    </div>
                    </a>
                @endforeach

                @if(count($contacts) == 0)
                    <p>Esse contato não existe! <a href="/">ver todos os contatos</a></p>
                @endif
        </section>
        <section class="section_show">
            <div class="contact_profile hidden">
                <img src="" alt="">
                <h3></h3>
                </div>
                <div class="contact_info hidden">
                <span>Número:</span>
                <p id="p_number"></p>
                <span>E-mail:</span>
                <p id="p_email"></p>
                <div class="group_buttons">
                <a class="hover" href=""><button class="button">Editar</button></a>
                <form class="hover" action="" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="button" type="submit">Excluir</button>
                </form>
                </div>
            </div>
        </section>
        </div>
        </div>
        <div id="dadosContato"></div>
    </div>
@endsection

@section('javascript')
<script src='/js/app.js'></script>
@endsection