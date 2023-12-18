@extends('layout.template')
@section('titulo', 'Meu perfil')

@section('conteudo')
    
            <!-- Page Content -->
            <main class="w-100">
                {{ $slot }}
            </main>
        </div>
@endsection
