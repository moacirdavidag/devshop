@extends('layout.template')
@section('titulo', $produto->nome)

@section('conteudo')
    <div class="container d-flex mx-auto my-5">
        <div class="w-50">
            <img class="mx-auto w-75" src="{{ asset('/storage/produtos/' . $produto->imagem) }}" alt="{{ $produto->nome }}" />
        </div>
        <div class="w-50 text-start">
            <div class="my-3 d-flex justify-content-between fs-3 fw-bold">
                <div id="tituloProduto">
                    {{ $produto->nome }}
                </div>
                @auth()
                    @if (Auth::user()->isAdmin)
                        <div id="acoesProduto" class="d-flex">
                            <div id="editarProdutoDiv">
                                <a href="/produto/editar/{{ $produto->id }}"> <i class="fa-solid fa-pen-to-square"></i> </a>
                            </div>
                            <form action="{{ route('produtos.deletar', $produto->id) }}" method="POST">
                                @csrf
                                <button class="btn fs-3" type="submit"><i class="fa-solid fa-trash"></i></button>
                                <input type="hidden" name="_method" value="DELETE">
                            </form>
                        </div>
                    @endif
                @endauth
            </div>
            <div class="my-5">
                <p class="fs-5">
                    <span class="fw-medium">Preço:</span>
                    R$ {{ $produto->preco }}
                </p>
                <p class="fs-5">
                    <span class="fw-medium">Quantidade em estoque:</span>
                    {{ $produto->quantidadeEstoque }}
                </p>
                <div id="adicionarAoCarrinho">
                    <button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i> Adicionar ao carrinho</button>
                </div>
            </div>
            <section class="my-5 bg-secondary-subtle text-start p-3">
                <p class="fw-medium fs-5">Descrição do produto:</p>
                <p>{{ $produto->descricao }}</p>
            </section>
        </div>
    </div>

    </form>
@endsection
