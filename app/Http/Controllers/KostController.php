<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;

class KostController extends Controller
{
    public function index()
    {
        $kosts = Kost::all();
        return view('admin.kost.index', compact('kosts'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nama_pemilik' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'harga' => 'required',
            'status' => 'required',
            'tipe' => 'required',
        ]);

        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('/foto_kost'), $filename);
            $validatedData['foto'] = $filename;
        }

        Kost::create($validatedData);
        return redirect('/kost')->with('status', 'Data Kost Berhasil Ditambahkan!');
    }

    public function destroy($id){
        Kost::destroy($id);
        return redirect('/kost')->with('status', 'Data Kost Berhasil Dihapus!');
    }
}
