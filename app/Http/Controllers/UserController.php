<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.user.index', compact('users'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'kota_asal' => 'required',
            'status' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::create($validateData);
        Alert::success('Berhasil', 'Pengguna berhasil ditambahkan');
        return redirect('/user')->with('success', 'Pengguna berhasil ditambahkan');
    }

    public function destroy($id)
    {
        User::destroy($id);
        Alert::success('Berhasil', 'Pengguna berhasil dihapus');
        return redirect('/user')->with('success', 'Pengguna berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'tgl_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'no_telp' => 'required',
            'kota_asal' => 'required',
            'status' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        User::whereId($id)->update($validateData);
        Alert::success('Berhasil', 'Pengguna berhasil diupdate');
        return redirect('/user')->with('success', 'Pengguna berhasil diupdate');
    }
}
