@extends('layout.template')
@section('titulo', 'Categorias')

@section('conteudo')
    <a href="/categorias/criar">Adicionar categoria</a>
    @if (count($categorias) > 0)
        <div class="container mx-auto d-flex flex-wrap justify-content-between">
            @foreach ($categorias as $categoria)
                <form action="{{ route('categorias.deletar', $categoria->id) }}" method="post">
                    @csrf
                    <div class="mt-3">
                        <div class="card" style="width: 18rem;">
                            <div class="card-body h-25">
                                <p class="card-text fs-4 fw-medium">{{ $categoria->nome }}</p>
                                <a href="{{ route('produtos.detalhes', ['id' => $categoria->id]) }}"><button
                                        class="btn btn-outline-secondary">Visitar</button></a>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        </div>
    @else
        <p>Nenhuma categoria registrada</p>
    @endif
@endsection
