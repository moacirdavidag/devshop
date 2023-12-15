@extends('layout.template')
@section('titulo', 'Categorias')

@section('conteudo')
    <a href="/categorias/criar">Adicionar categoria</a>
    @if (count($categorias) > 0)
        <ul>
            @foreach ($categorias as $categoria)
            <li>{{$categoria->nome}}
                <form action="{{route('categorias.deletar', $categoria->id)}}" method="post">
                    @csrf 
                    <input type="hidden" name="_method" value="delete">
                    <input type="submit" value="Excluir">
                </form>
            </li>
            @endforeach
        </ul>
    @else
        <p>Nenhuma categoria registrada</p>
    @endif
@endsection
