@extends('layout.template')
@section('titulo', $produto->nome)

@section('conteudo')
    <h3>{{$produto->nome}}</h3>
    <p>{{$produto->descricao}}</p>
    <p>{{$categoria[0]->nome}}</p>
    <a href="/produto/editar/{{$produto->id}}">Editar</a>
    <form action="{{route('produtos.deletar', $produto->id)}}" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" value="Excluir produto">
    </form>
@endsection