<?php

namespace App\Http\Controllers;

use App\Models\DetailOrderings;
use App\Models\Order;
use App\Models\Ordering;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;

class PesananController extends Controller
{
    //
    public function index()
    {
        $orders = Order::latest()->get();
        $lastPrice = $orders->sum('total_price');
        return view('pesanan.index', compact('orders', 'lastPrice'));
    }
    public function edit(Request $request, $id)
    {
        $pesanan = Order::find($id);

        if ($request->quantity == 0) {
            $pesanan->delete();
            return back();
        }
        $pesanan->quantity = $request->quantity;
        $pesanan->total_price = $request->quantity * $pesanan->product->price;
        $pesanan->update();
        return back();
    }
    public function RemoveAll()
    {
        if (Auth::check()) {
            Order::truncate();
            return back()->with('removeAll', 'Semua pesanan berhasil terhapus');
        }
        return redirect('/login');
    }
    public function remove($id)
    {
        if (Auth::check()) {
            $pesanan = Order::find($id);
            $pesanan->delete();
            return back()->with('remove', 'List pesanan berhasil terhapus');
        }
        return redirect('/login');
    }
    public function pesanMenu(Request $request)
    {
        $ordering = new Ordering;
        $ordering->no_pesanan = 'PO' . date("y") . date("m") . date("d") . rand(0000, 9999) . date("h");
        $ordering->date_order = Carbon::now();
        $ordering->last_price = $request->lastprice;
        $ordering->pay = str_replace(".", "", $request->pay);
        $ordering->cashier_name = Auth::user()->name;
        $ordering->save();
        $id = $ordering->id;
        $orders = Order::latest()->get();

        foreach ($orders as $item) {
            $product = Product::find($item->product_id);
            $detail = new DetailOrderings;
            $detail->ordering_id = $id;
            $detail->product_name = $product->name;
            $detail->product_price = $product->price;
            $detail->quantity = $item->quantity;
            $detail->total_price = $item->total_price;
            $detail->save();
        }
        Order::truncate();
        return redirect('/cetakstruk')->with('idDetailOrder',  $id);
    }
    public function finish()
    {
        $ordering = Ordering::find(session('idDetailOrder'));
        $exchange = $ordering->pay - $ordering->last_price;
        return view('pesanan.finish', compact('exchange'));
    }
    public function printpdf($id)
    {
        $detail = DetailOrderings::where('ordering_id', $id)->get();
        /*   dd($detail); */
        $pdf = PDF::loadView('print.struk', compact('detail'));
        return $pdf->stream('struk.pdf');
    }
    public function searchOrdering(Request $request)
    {
        $idPesanan = $request->searchOrdering;
        $ordering = Ordering::where('no_pesanan', $idPesanan)->get('id')->toArray();
        if ($ordering != null) {
            $id = $ordering;
            $nomorPesanan = $idPesanan;
            $detail = DetailOrderings::where('ordering_id', $id)->get();
            return view('pesanan.cari', compact('detail', 'nomorPesanan'));
        } else {
            return redirect('/')->with('emptyData', 'Pesanan yang Anda cari tidak ada!');
        }
    }
}
