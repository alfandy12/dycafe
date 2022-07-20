<?php

namespace App\Http\Controllers;

use App\Models\Ordering;
use App\Http\Requests\StoreOrderingRequest;
use App\Http\Requests\UpdateOrderingRequest;
use App\Models\DetailOrderings;

class OrderingAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $orderings = Ordering::latest()->paginate(8)->withQueryString();
        if (request('search')) {
            $orderings = Ordering::latest()->where('name', 'like', '%' .request('search'). '%')->paginate(8);
                $orderings->appends(['search' => request('search')]);
        }
        return view('admin.pesanan.index', compact('orderings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderingRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordering  $ordering
     * @return \Illuminate\Http\Response
     */
    public function show(Ordering $ordering, $id)
    {
        //
        $getDetail = DetailOrderings::where('ordering_id',$id)->get();
        return view('/admin.pesanan.show', compact('getDetail'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordering  $ordering
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordering $ordering)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderingRequest  $request
     * @param  \App\Models\Ordering  $ordering
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderingRequest $request, Ordering $ordering)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordering  $ordering
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordering $ordering)
    {
        //
    }
}
