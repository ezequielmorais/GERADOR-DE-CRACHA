@extends('templates.template')
@section('title', 'welcome')
@section('Conteudo')


<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="search-container">
    <input type="text" placeholder="Pesquisar..." class="search-input">
    <button class="search-button">Buscar</button>
</div>

@endsection