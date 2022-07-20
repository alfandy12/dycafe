<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;


class MenuController extends Controller
{
    //
    public function index()
    {
        $product = Product::latest()->orderby('category_id', 'asc')->get();
        if (request('search')) {
            $product = Product::where('name' , 'like',"%".request('search')."%")->get();
            
            
      /*       dd($product); */
        }
  
        $countOrders = Order::all();
        $categories = Category::all();
        return view('menu.index', [
            'product' => $product,
            'countOrders' => $countOrders,
            'categories' => $categories,
        ]);
    }
    public function category($id)
    {   
        $category = Category::find($id);
        $menu = Product::where('category_id', $category->id)->get();
        if (request('search')) {
            $menu = Product::where('name' , 'like',"%".request('search')."%")->get(); 
        }       
        $categories = Category::all();
        $countOrders = Order::all();
        return view('menu.category', [
            'categories' => $categories, 
            'menu' => $menu, 
            'countOrders' => $countOrders, 
            'category' => $category,
        ]);
    }
    public function getOrder($id)
    {
        // kalo misalkan product id nya gk sama kaya id kita save kalo sama kita update
        //cari produk berdasarkan id
        $productDetail = Product::where('id', $id)->firstOrFail();
        //ambil product id di tabel order
        $orderGet = Order::where('product_id', $id)->get()->first();
        // jika product blm ada di tabel order kita tambahin
        if ($orderGet === null) {
            $product = new Order();
            $product->product_id = $id;
            $product->quantity = 1;
            $product->total_price = $product->quantity * $productDetail->price;
            $product->save();
            //atau jika sudah ada tinggal kita ubah quentity sama harga
        } else if ($orderGet != $id) {
            $orderGet->quantity = $orderGet->quantity + 1;
            $orderGet->total_price = $orderGet->quantity * $productDetail->price;
            $orderGet->update();
        }
        return redirect('/')->with('successOrder', '&nbsp;Pesanan '."<b>".ucwords($productDetail->name)."</b>".' sudah di tambahkan kedaftar list pesanan');
    }
}
