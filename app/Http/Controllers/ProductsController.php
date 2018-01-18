<?php

namespace App\Http\Controllers;



use Request;
use App\Product;
use App\Http\Requests\CreateProductRequest;
use Auth;
use Session;
use App\Vendor;
use App\Price;

class ProductsController extends Controller
{

    public function __construct(){
        $this->middleware('auth', ['except' => 'index']);
    }

    //lista produktów
    public function index(){
        $products = Product::paginate(16);
        return view('products.index')->with('products', $products);
    }

    //wyświetla pojedynczy record
    public function show($id){
        //zmienna vendors jest potrzebna do uzupełnienia wartości formularza
        $vendors = Product::findOrFail($id)->vendors()->first()['id'];
        $product = Product::findOrFail($id);
        return view('products.show', compact('product', 'vendors'));
    }

    //formluarz dodawania produktów
    public function create(){
        $vendors = Vendor::pluck('name', 'id');
        return view('products.create')->with('vendors', $vendors);
    }

    //zapis produktu do bazy
    public function store(CreateProductRequest $request){
        $product = new Product($request->all());
        Auth::user()->products()->save($product);

        $vendorIds = $request->input('VendorList');
        $product->vendors()->attach($vendorIds);
        $price = new Price($request->all());
        $product->prices()->save($price);
        Session::flash('product_created', 'Dodano produkt');
        return redirect('products');
    }

    //edycja rekordu
    public function edit($id){
        $vendors = Vendor::pluck('name', 'id');
        $price = Product::findOrFail($id)->prices->last()['value'];
        $product = Product::findOrFail($id);
        return view('products.edit',  compact('product', 'vendors', 'price'));
    }


    //aktualizacja rekordu
    public function update($id, CreateProductRequest $request){
        $product = Product::findOrFail($id);
        $product->update($request->all());
        $product->vendors()->sync($request->input('VendorList'));
        if($request->input('value') && Product::findOrFail($id)->prices->last()['value'] != $request->input('value')){
        $price = new Price($request->all());
        $product->prices()->save($price);
        }
        return redirect()->action(
            'ProductsController@show', ['id' => $id]
        );
    }

    //niszczenie produktu
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect('products');
    }
}

