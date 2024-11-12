@extends('master')

@section('content')



@if (session()->has('message'))
    {{ session()->get('message') }}
@endif

<h2>Produtos</h2>

<ul>
    @foreach ($produtos as $produto)
    <li>{{ $produto->name }} | {{ $produto->email }} <a href="{{ route('produtos.edit', ['produto'=> $produtos->id]) }}">Editar</a> | 
    </li> | <a href="{{ route('produtos.show', ['produto' => $produtos->id]) }}">Delete</a>
    
    @endforeach
</ul>