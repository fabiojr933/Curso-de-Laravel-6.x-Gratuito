@extends('admin.layouts.app');

@section('content')
    <h1>Cadastrar</h1>
    <hr />
    @include('admin.includes.alerts')
    <hr />
    <div class="form-group container">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="form">
            @csrf
            <input class="form-control" type="text" name="name" placeholder="nome" value="{{ old('name') }}" /><br/>
            <input class="form-control" type="text" name="description" placeholder="descrição"
                value="{{ old('description') }}" /><br/>
            <input class="form-control" type="file" name="image"><br/>
            <input class="form-control" type="text" placeholder="valor" name="price"><br/>
            <button class="btn btn-primary" type="submit">Salvar</button>
        </form>
    </div>
@endsection
