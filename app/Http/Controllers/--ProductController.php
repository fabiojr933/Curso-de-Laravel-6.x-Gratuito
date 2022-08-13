<?php

namespace App\Http\Controllers;

class ProductController extends Controller
{
    public function index()
    {
        $produts = ['produto01', 'produto02', 'produto03'];
        return $produts;
    }
    public function show($id)
    {
        return "produto do id {$id}";
    }
    public function create()
    {
        return "create produto";
    }
    public function edit($id)
    {
        return "editar produto {$id}";
    }
    public function store()
    {
        return "cadastrar produto ";
    }
    public function update($id)
    {
        return "editando produto {$id} ";
    }
    public function destroy($id)
    {
        return "deletando produto {$id} ";
    }
}
