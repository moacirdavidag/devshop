@extends('layout.template')
@section('titulo', 'Criar categoria')

@section('conteudo')
    <form action="{{ route('categorias.criar') }}" method="post">
        @csrf
        <h2>Criar categoria</h2>
        <div>
            <label for="nome">Nome da categoria: </label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <input type="submit" value="Criar categoria">
        </div>
    </form>
    @if ($errors -> any())
        <ul>
            @foreach($errors->all() as $erro) 
                <li>{{$erro}}</li>
            @endforeach
        </ul>
    @endif
@endsection
