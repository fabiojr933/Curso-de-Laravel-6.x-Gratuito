@extends('admin.layouts.app');

@section('content')
    <h1>EDITAR PRODUTOS {{ $product->name }}</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <input type="text" name="name" placeholder="nome" value="{{ $product->name }}" />
        <input type="text" name="description" placeholder="descrição" value="{{ $product->description }}" />
        <input type="text" name="price" placeholder="preço" value="{{ $product->price }}" />
        <button type="submit">Salvar</button>
    </form>
@endsection
