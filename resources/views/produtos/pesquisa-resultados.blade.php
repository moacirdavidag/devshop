@extends('layout.template')
@section('titulo', 'Buscar produtos')

@section('conteudo')
<div class="w-100 mx-auto mt-5">
    <h1 class="text-start mx-5">Resultados encontrados</h1>
    <div class="container w-100 d-flex flex-wrap justify-content-between">
        @if (count($resultados) > 0)
            @foreach ($resultados as $produto)
                <div class="mt-3">
                    <div class="card" style="width: 18rem;">
                        <img src="{{ asset('/storage/produtos/' . $produto->imagem) }}" class="card-img-top"
                            alt="{{ $produto->nome }}">
                        <div class="card-body h-25">
                            <p class="card-text fs-5 fw-medium">{{ $produto->nome }}</p>
                            <a href="{{ route('produtos.detalhes', ['id' => $produto->id]) }}"><button
                                    class="btn btn-outline-secondary">Detalhes</button></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <p>Nenhum produto encontrado</p>
        @endif
    </div>
    {{$resultados->links()}}
@endsection
