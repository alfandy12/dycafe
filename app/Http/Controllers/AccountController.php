<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accounts = User::latest()->paginate(8)->withQueryString();
        if (request('search')) {
            $accounts = User::latest()->where('name', 'like', '%' .request('search'). '%')->paginate(8);
                $accounts->appends(['search' => request('search')]);
        }
        return view('admin.account.index', compact('accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $valid = $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
            'level' => 'required',
            'username' => 'required',
        ]);
        $account = new User;
        $account->level = $valid['level'];
        $account->name = ucwords($valid['name']);
        $account->username = $valid['username'];
        $account->password = Hash::make($valid['password']);
        $account->level = $valid['level'];
        $account->save();
       return redirect('/admin-account')->with('doneDelete','Account Telah Berhasil Di tambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, $id)
    {
        //
        $account = User::find($id);
        return view('admin.account.edit', compact('account'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {
        //
        $valid = $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
            'level' => 'required',
            'username' => 'required',
        ]);
        $account = User::find($id);
        $account->level = $valid['level'];
        $account->name = ucwords($valid['name']);
        $account->username = $valid['username'];
        $account->password = Hash::make($valid['password']);
        $account->level = $valid['level'];
        $account->update();
       return redirect('/admin-account')->with('doneDelete','Account Telah Berhasil Di Ubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        //
        $account = User::find($id);
        $account->delete();
        return redirect('/admin-account')->with('doneDelete', 'Account telah berhasil di hapus!');
    }
}
