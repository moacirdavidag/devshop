@extends('layout.template')
@section('titulo', 'A loja do Dev')

@section('conteudo')
    <div class="container-lg m-5">
        <div id="carouselExampleFade" class="carousel slide carousel-fade w-100 m-auto" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="/img/carousel_1.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="/img/carousel_2.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="w-100 mx-auto mt-3">
            <h2 class="text-start">Camisetas</h2>
            <div class="container bg-light p-4 mt-3 d-flex justify-content-evenly">
                @foreach ($camisetas as $camiseta)
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('/storage/produtos/'.$camiseta->imagem)}}" class="card-img-top" alt="{{$camiseta->nome}}">
                        <div class="card-body">
                            <p class="card-text">{{$camiseta->nome}}</p>
                            <a href="{{route('produtos.detalhes', ['id' => $camiseta->id])}}"><button class="btn btn-outline-secondary">Detalhes</button></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="text-end"><a href="/categorias/1">Ir para a categoria de camisetas</a></p>
        </div>
        <div class="w-100 mx-auto mt-3">
            <h2 class="text-start">Acessórios</h2>
            <div class="container bg-light p-4 mt-3 d-flex justify-content-evenly">
                @foreach ($acessorios as $acessorio)
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('/storage/produtos/'.$acessorio->imagem)}}" class="card-img-top" alt="{{$acessorio->nome}}">
                        <div class="card-body">
                            <p class="card-text">{{$acessorio->nome}}</p>
                            <a href="{{route('produtos.detalhes', ['id' => $acessorio->id])}}"><button class="btn btn-outline-secondary">Detalhes</button></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <p class="text-end"><a href="/categorias/2">Ir para a categoria de acessórios</a></p>
        </div>
    </div>
@endsection
