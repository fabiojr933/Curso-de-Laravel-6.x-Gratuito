@extends('admin.layouts.app');

@section('content')
    <h1>Exibindo os produtos</h1>

    <div class="container">
        <a class="btn btn-primary" href="{{ route('products.create') }}">Novo cadastrar</a>
        <hr />
        <table class="table">
            <thead>
                <th>Nome</th>
                <th>Preco</th>
                <th>Acao</th>
            </thead>
            <tbody>
                @foreach ($products as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->price }}</td>
                        <td>
                            <a href="{{ route('products.edit', $item->id) }}">Editar</a>    
                            <a href="{{ route('products.show', $item->id) }}">Detalhe</a>                         
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {!! $products->links() !!}
    @endsection
</div>
