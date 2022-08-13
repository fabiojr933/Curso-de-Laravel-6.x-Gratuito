@extends('admin.layouts.app');

@section('content')
    <h1>{{ $product->name }}</h1>
    <a href="{{ route('products.index') }}">Voltar</a>

    <ul>
        <li><strong>Nome</strong>{{ $product->name }}</li>
        <li><strong>Preço</strong>{{ $product->price }}</li>
        <li><strong>Descrição</strong>{{ $product->description }}</li>
    </ul>

    <form action="{{ route('products.destroy', $product->id) }}" method="Post">
        @csrf
        @method('DELETE')
        <button class="btn btn-primary" type="submit">Deletar</button>
    </form>
@endsection
