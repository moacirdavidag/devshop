@extends('layout.template')
@section('titulo', 'Produtos')

@section('conteudo')
    <h1>Produtos</h1>
    @if ($produtos)
        @foreach ($produtos as $produto)
            {{ $produto }}
        @endforeach
    @else
        <p>Nenhum produto registrado</p>
    @endif

@endsection
