<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemilikKost;
use RealRashid\SweetAlert\Facades\Alert;

class PemilikKostController extends Controller
{
    public function index()
    {
        $pemiliks = PemilikKost::all();
        return view('admin.pemilikkost.index', compact('pemiliks'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        PemilikKost::create($validateData);
        Alert::success('Berhasil', 'Pemilik Kost berhasil ditambahkan');
        return redirect('/pemilik-kost')->with(
            'success',
            'Pemilik Kost berhasil ditambahkan'
        );
    }

    public function destroy($id)
    {
        PemilikKost::destroy($id);
        Alert::success('Berhasil', 'Pemilik Kost berhasil dihapus');
        return redirect('/pemilik-kost')->with('success', 'Pemilik Kost berhasil dihapus');
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        PemilikKost::whereId($id)->update($validateData);
        Alert::success('Berhasil', 'Pemilik Kost berhasil diupdate');
        return redirect('/pemilik-kost')->with('success', 'Pemilik Kost berhasil diupdate');
    }
}
