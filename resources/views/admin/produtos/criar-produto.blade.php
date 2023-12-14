@extends('layout.template')
@section('titulo', 'Criar produto')

@section('conteudo')
    <h1>Criar produto</h1>
    <form action="{{route('produtos.store')}}" method="post">
        @csrf
        <div>
            <label for="nome">Nome do produto:</label>
            <input type="text" name="nome" id="nome">
        </div>
        <div>
            <label for="descricao">Descrição do produto:</label>
            <input type="text" name="descricao" id="nome">
        </div>
        <div>
            <input type="submit" value="Criar produto">
        </div>
    </form>
    @if ($errors -> any()) 
        <div class="text-danger border border-danger">
            <ul>
                @foreach ($errors->all() as $erro)
                    <li>{{$erro}}</li>
                @endforeach
            <ul>
        </div>
    @endif
@endsection 
