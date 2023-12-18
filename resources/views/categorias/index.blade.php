@extends('layout.template')
@section('titulo', 'Categorias')

@section('conteudo')
    @if (count($categorias) > 0)
        <div class="container mx-auto d-flex flex-wrap justify-content-between">
            @foreach ($categorias as $categoria)
                <div class="mt-3">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body h-25">
                            <p class="card-text fs-4 fw-medium">{{ $categoria->nome }}</p>
                            <a href="{{ route('categorias.produtos', ['id' => $categoria->id]) }}"><button
                                    class="btn btn-outline-secondary">Visitar</button></a>
                        </div>
                        @auth
                            @if (Auth::user()->isAdmin)
                                <form action="{{ route('categorias.deletar', $categoria->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="delete" />
                                    <button class="btn" type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            @endif
                        @endauth
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <p>Nenhuma categoria registrada</p>
    @endif
    @auth
        @if (Auth::user()->isAdmin)
            <a class="btn btn-primary my-3" href="/categorias/criar">Adicionar categoria</a>
        @endif
    @endauth
@endsection
