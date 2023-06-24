<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;
use App\Models\Wisata;

class wisataController extends Controller
{
    public function showData() {
        $wisatas = DB::table('wisatas')
        ->select('*','wisatas.id AS wisata_id','kategoris.id AS kategori_id')
        ->join('kategoris','kategoris.id','=','wisatas.id_jenis_kategori')->get();
        return view('objek', [
            'wisatas'=>$wisatas,

        ]);
    }
    public function insertWisata(){
        $kategori = DB::table('kategoris')->get();

        return view('insertWisata', [
        'kategori' => $kategori
        ]);
    }
    public function addData(Request $request) {
        $validated = $request->validate([
            'jenis_kategori' => 'required',
            'nama_wisata' => 'required',
            'alamat_wisata' => 'required',
            'harga' => 'required'
        ]);
    
        if ($validated) {
            $jenisKategori = $request->jenis_kategori;
            $namaWisata = $request->nama_wisata;
            $alamatWisata = $request->alamat_wisata;
            $harga = $request->harga;
    
            DB::table('wisatas')->insert([
                'id_jenis_kategori' => $jenisKategori,
                'nama_wisata' => $namaWisata,
                'alamat_wisata' => $alamatWisata,
                'harga' => $harga
            ]);
    
            return redirect('/objek');
        }
    }
    public function deleteData(Request $request) {
        $id = $request->id;
        DB::table('wisatas')->where('id', $id)->delete();
        return back();
    }

    public function editData($id) {
        $wisata = DB::table('wisatas')->where('id', $id)->first();
        $kategori = DB::table('kategoris')->get();

        return view('editWisata', [
            'data' => $wisata,
            'kategori' => $kategori
        ]);
    }

    public function updateData(Request $request) {
       $validated = $request->validate([
        'jenis_kategori' => 'required',
        'nama_wisata' => 'required',
        'alamat_wisata' => 'required',
        'harga' => 'required'
    ]);

    if ($validated) {
        $id = $request->id;
        $jenisKategori = $request->jenis_kategori;
        $namaWisata = $request->nama_wisata;
        $alamatWisata = $request->alamat_wisata;
        $harga = $request->harga;

        DB::table('wisatas')
            ->where('id', $id)
            ->update([
                'id_jenis_kategori' => $jenisKategori,
                'nama_wisata' => $namaWisata,
                'alamat_wisata' => $alamatWisata,
                'harga' => $harga
            ]);

        return back();
    }
    }
}
