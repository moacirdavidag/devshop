@extends('layout.template')
@section('titulo', 'Produtos')

@section('conteudo')
    <h1>Produtos</h1>
    @if ($produtos)
        <ul>
            @foreach ($produtos as $produto)
                <li>{{ $produto->nome }} - <a href="{{route('produtos.detalhes', $produto->id)}}">Detalhes</a></li>
            @endforeach
        </ul>
    @else
        <p>Nenhum produto registrado</p>
    @endif

@endsection
