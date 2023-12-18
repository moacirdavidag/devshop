@extends('layout.template')
@section('titulo', 'Criar categoria')

@section('conteudo')
    <form action="{{ route('categorias.criar') }}" method="post" class="w-100 my-5">
        @csrf
        <h2>Criar categoria</h2>
        <div>
            <label for="nome">Nome da categoria: </label>
            <input type="text" class="form-control mx-auto my-2 w-25" name="nome" id="nome">
        </div>
        <div>
            <input type="submit" class="form-control mx-auto my-2 w-25 btn btn-success" value="Criar categoria">
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
