<?php

namespace App\Http\Controllers;

use App\Exports\ProdukExport;
use App\Models\Kategori;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Produk::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where('nama_barang', 'ilike', '%' . $search . '%');
        }

        if ($request->filled('filter')) {
            $filter = $request->input('filter');
            $query->orWhere('kategori', 'ilike', '%' . $filter . '%');
        }

        $produk = $query->paginate(5);
        $kategori = Kategori::all();

        foreach ($kategori as $value) {
            if ($value['kategori'] == $request->input('filter')) {
                Session::put('filter', $request->input('filter'));
            } else {
                Session::put('filter', "Semua");
            }
        }

        return view("produk", ['produk' => $produk, 'kategori' => $kategori]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view("tambah_produk", ['kategori' => $kategori]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori' => 'required|max:100|min:4|string',
            'nama_barang' => 'required|unique:products|max:100|min:4|string',
            'harga_beli' => 'required|numeric|min:4',
            'harga_jual' => 'required|numeric',
            'stok_barang' => 'required|numeric',
            'image' => 'required|mimes:jpg,png|max:100|file'
        ]);



        if ($validator->fails()) {
            return redirect('/tambah-produk')
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file("image");
        $name = $image->getClientOriginalName();
        $path = $image->move(public_path('assets'), $name);

        $product = new Produk();
        $product->kategori = $request->kategori;
        $product->nama_barang = $request->nama_barang;
        $product->harga_beli = $request->harga_beli;
        $product->harga_jual = $request->harga_jual;
        $product->stok_barang = $request->stok_barang;
        $product->image = $name;
        $product->save();

        return redirect('/produk')->with('success', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produk = Produk::find($id);

        $kategori = Kategori::all();

        if (!$produk) {

            return  redirect()->back();
        }

        return view('edit_product', ['produk' => $produk, 'kategori' => $kategori]);
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
        $validator = Validator::make($request->all(), [
            'kategori' => 'required|max:100|min:4|string',
            'nama_barang' => 'required|unique:products|max:100|min:4|string',
            'harga_beli' => 'required|numeric|min:4',
            'harga_jual' => 'required|numeric',
            'stok_barang' => 'required|numeric',
            'image' => 'required|mimes:jpg,png|max:100|file'
        ]);



        if ($validator->fails()) {
            return redirect('/tambah-produk')
                ->withErrors($validator)
                ->withInput();
        }

        $image = $request->file("image");
        $name = $image->getClientOriginalName();
        $path = $image->move(public_path('assets'), $name);

        $product = Produk::find($id);
        $product->kategori = $request->kategori;
        $product->nama_barang = $request->nama_barang;
        $product->harga_beli = $request->harga_beli;
        $product->harga_jual = $request->harga_jual;
        $product->stok_barang = $request->stok_barang;
        $product->image = $name;
        $product->update();

        return redirect('/produk')->with('success', 'The product has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Produk::destroy($id);

        return redirect('/produk')->with('success', 'The product has been successfully deleted');
    }


    public function Export()
    {
        $query = Session::get('filter');
        return (new ProdukExport($query))->download('produk.xlsx');;
    }
}
