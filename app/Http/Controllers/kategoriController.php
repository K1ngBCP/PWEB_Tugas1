<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Kategori;

class kategoriController extends Controller
{
    public function insert()
    {
        return view('insert');
    }

    public function showData() {
        $kategoris = DB::select('SELECT * FROM kategoris');
        return view('kategori', ['kategoris' => $kategoris]);
    }

    public function addData(Request $request) {
        $validated = $request->validate([
            'jenis_kategori' => 'required'
        ]);
        
        if ($validated) {
            $jenisKategori = $request->jenis_kategori;
                
            DB::statement("INSERT INTO kategoris (jenis_kategori, created_at, updated_at) VALUES ('$jenisKategori', NOW(), NOW())");
        
            return back();
            // return redirect('/kategori');
        }
    }
    public function deleteData(Request $request) {
        $id = $request->id;
        DB::statement("DELETE FROM kategoris WHERE id = $id");
        return back();
    }
    public function editData($id) {
        $kategori = DB::select("SELECT * FROM kategoris WHERE id = $id");

        return view('edit', [
        'data' => $kategori[0],
        ]);
    }
    public function updateData(Request $request) {
        $validated = $request->validate([
            'jenis_kategori' => 'required'
        ]);
    
        if ($validated) {
            $id = $request->id;
            $jenisKategori = $request->jenis_kategori;
    
            DB::statement("UPDATE kategoris SET jenis_kategori = '$jenisKategori', updated_at = NOW() WHERE id = $id");
    
            return back();
        }
    }
}