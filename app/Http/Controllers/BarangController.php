<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;

class BarangController extends Controller
{
public function home(){
    $hasil = Barang::all();
    return view('list-barang', ['data' => $hasil]);
}
public function tambah(Request $req)
    {
        $data = new Barang;
        $data->kategori = $req->kategori;
        $data->nama = $req->nama;
        $data->jumlah = $req->jumlah;
        $data->save();

        return $this->home();
    }

    public function hapus($req)
    {
        $data = Barang::find($req);
        $data->delete();

        return $this->home();
    }

    public function formUbah($req)
    {
        $hasil = Barang::find($req);
        return view('form-ubah-brg', ['data' => $hasil]);
    }
    public function ubah(Request $req)
    {
        $data = Barang::find($req->id);
        $data->kategori = $req->kategori;
        $data->nama = $req->nama;
        $data->jumlah = $req->jumlah;
        $data->save();
        return $this->home();
    }
}
