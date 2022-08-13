<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    protected $request;
    protected $repository;

    public function __construct(Request $request, Product $product)
    {

        // dd($request);
        $this->request = $request;
        $this->repository = $product;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $products = Product::paginate();
        return view('admin.pages.products.index', [
            'products' => $products,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUpdateProductRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProductRequest $request)
    {
        $data = $request->only('name', 'description', 'price');
        Product::create($data);
        return redirect()->route('products.index');
        /*
        $request->validate([
        'name'=> 'required|min:3|max:255',
        'description'=> 'nullable|min:3|max:1000',
        'photo'=> 'nullable|image'
        ]);

         */
        // dd('ok');

        // dd($request->all());
        // dd($request->only(['name', 'description']));
        // dd($request->has('name')) //true ou false;
        // dd($request->name);
        // dd($request->input('name', 'valor default'));
        // dd($request->except('name')); // vai ignorar o valor do name

        //upload de arquivo

        //echo    if ($request->file('photo')->isValid()) {
        // $nameFile = $request->name . '.' . $request->photo->extension();
        //     $request->file('photo')->store('products');
        //  $request->file('photo')->storeAs('products', $nameFile);
        //  }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->first();
        return view('admin.pages.products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->repository->find($id);
        return view('admin.pages.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        $product = $this->repository->find($id);
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $product = $this->repository->where('id', $id)->first();
        $product->delete();
        return redirect()->route('products.index');
    }
}
