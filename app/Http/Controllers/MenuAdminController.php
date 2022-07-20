<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\DetailOrderings;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MenuAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::latest()->paginate(8)->withQueryString();
        if (request('search')) {
            $products = Product::latest()->where('name', 'like', '%' .request('search'). '%')->paginate(8);
                $products->appends(['search' => request('search')]);
        }
       

        $categories = Category::all();
        
        return view('admin.menu.index', [
            'products' => $products,
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
       $valid = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'price' => 'required',
            'image' => 'required',
        ]);

        
        $imageName = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('/assets/img'), $imageName);
        
        $product =  new Product;
        $product->category_id = $valid['category'];
        $product->name = ucwords($valid['name']);
        $product->price = str_replace(".", "", $valid['price']);
        $product->image = $imageName;
        $product->created_at = Carbon::now();
        $product->updated_at = Carbon::now();
        $product->save();

        return redirect('/admin-menu')->with('success', 'Data Telah Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, $id)
    {
        //
        $product = Product::find($id);
        $categories = Category::all();
        return view('admin.menu.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product, $id)
    {
        //
        $valid = $request->validate([
            'category' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);

    
        if ($request->file('image')) {
           if ($request->deleteOldImage) {
               $storageImage = 'assets/img/'.$request->deleteOldImage;
                unlink($storageImage);
            } 
            $imageName = time().'.'.$request->image->getClientOriginalExtension();
            $request->image->move(public_path('/assets/img'), $imageName);
        } else {
            $imageName = $request->deleteOldImage ;
        }

        $productUpdate = Product::find($id);
        $productUpdate->category_id = $valid['category'];
        $productUpdate->name = ucwords($valid['name']);
        $productUpdate->price = str_replace(".", "", $valid['price']);
        $productUpdate->image = $imageName;
        $productUpdate->created_at = Carbon::now();
        $productUpdate->updated_at = Carbon::now();
        $productUpdate->save();
        return redirect('/admin-menu')->with('success', 'Date Telah Berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product, $id)
    {
        //
        $menu = Product::find($id);
        $menu->delete();
        return redirect('/admin-menu')->with('success', 'Data Telah Berhasil di hapus');
        
      
    }
}
