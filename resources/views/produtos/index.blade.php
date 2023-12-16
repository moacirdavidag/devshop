@extends('layout.template')
@section('titulo', 'Produtos')

@section('conteudo')
    <div class="w-100 mx-auto mt-5">
        <h1 class="text-start mx-5">Produtos</h1>
        <div class="container w-100 d-flex justify-content-between">
            @if (count($produtos) > 0)
                @foreach ($produtos as $produto)
                    <div class="mt-3">
                        <div class="card" style="width: 18rem;">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body h-25">
                                <p class="card-text fs-5 fw-medium">{{ $produto->nome }}</p>
                                <a href="{{route('produtos.detalhes', ['id' => $produto->id])}}"><button class="btn btn-outline-secondary">Detalhes</button></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>Nenhum produto registrado</p>
            @endif
        </div>
        <a href="/produtos/criar">Adicionar produto</a>
    </div>
@endsection
