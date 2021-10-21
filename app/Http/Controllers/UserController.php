<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('admin');
        return view('user.index', [
            'judul' => 'List User',
            'data' => User::paginate(5)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.register', [
            'judul' => 'Register User',
            'data' => User::max('id')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $simpan = $request->validate([
            'name' => 'required|min:5|max:255',
            'username' => 'required|min:5|max:10|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:7|max:14',
            'ulangipassword' => 'same:password',
            'photo' => 'image|file|max:2048'
        ]);

        if ($request->file('photo')) {
            $simpan['photo'] = $request->file('photo')->store('foto-profil');
        }

        $simpan['password'] = Hash::make($simpan['password']);

        User::create($simpan);

        return redirect('/user/create')->with('berhasil', 'Registrasi User Baru berhasil!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('user.detail', [
            'judul' => 'Detail User',
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit', [
            'judul' => 'Register User',
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $rules = [
            'name' => 'required|min:5|max:255',
            'password' => 'required|min:7|max:14',
            'photo' => 'image|file|max:2048'
        ];

        $rules['password'] = Hash::make($rules['password']);

        if ($request->username != $user->username) {
            $rules['username'] = 'required|min:5|max:10|unique:users';
        }

        if ($request->email != $user->email) {
            $rules['email'] = 'required|email:dns|unique:users';
        }

        if ($request->file('photo')) {
            $rules['photo'] = $request->file('photo')->store('foto-profil');
        }

        $validatedData = $request->validate($rules);

        User::where('id', $user->id)
            ->update($validatedData);

        return redirect('/user')->with('berhasil', 'Data berhasil diperbaharui');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id);
        return redirect('/user')->with('berhasil', 'User berhasil dihapus!');
    }
}
