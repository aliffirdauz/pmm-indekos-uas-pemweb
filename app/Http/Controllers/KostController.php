<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kost;
use App\Models\PemilikKost;
use RealRashid\SweetAlert\Facades\Alert;

class KostController extends Controller
{
    public function index()
    {
        $kosts = Kost::all();
        $pemilik = PemilikKost::all();
        return view('admin.kost.index', compact('kosts','pemilik'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'pemilik_kost_id' => 'required',
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
        Alert::success('Berhasil', 'Data Kost Berhasil Ditambahkan!');
        return redirect('/kost')->with('status', 'Data Kost Berhasil Ditambahkan!');
    }

    public function destroy($id){
        Kost::destroy($id);
        Alert::success('Berhasil', 'Data Kost Berhasil Dihapus!');
        return redirect('/kost')->with('status', 'Data Kost Berhasil Dihapus!');
    }

    public function update(Request $request, $id){
        $old_foto = Kost::all()->where('id', $id)->first()->foto;
        $validatedData = $request->validate([
            'nama' => 'required',
            'pemilik_kost_id' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'deskripsi' => 'required',
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'harga' => 'required',
            'status' => 'required',
            'tipe' => 'required',
        ]);

        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $filename = time() . '.' . $foto->getClientOriginalExtension();
            $foto->move(public_path('/foto_kost'), $filename);
            $validatedData['foto'] = $filename;
        } else {
            $validatedData['foto'] = $old_foto;
        }

        Kost::whereId($id)->update($validatedData);
        Alert::success('Berhasil', 'Data Kost Berhasil Diubah!');
        return redirect('/kost')->with('status', 'Data Kost Berhasil Diubah!');
    }
}
