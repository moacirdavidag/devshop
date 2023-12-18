@extends('layout.template')
@section('titulo', 'Editar categoria')

@section('conteudo')
    <form action="{{ route('categorias.editar', $categoria->id) }}" method="post" class="w-100 my-5">
        @csrf
        <input type="hidden" name="_method" value="put">
        <h2>Editar categoria</h2>
        <div>
            <label for="nome">Nome da categoria: </label>
            <input type="text" class="form-control mx-auto my-2 w-25" name="nome" id="nome" value={{$categoria->nome}}>
        </div>
        <div>
            <input type="submit" class="form-control mx-auto my-2 w-25 btn btn-success" value="Editar categoria">
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
