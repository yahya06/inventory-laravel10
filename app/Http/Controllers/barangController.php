<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\categoryBarang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    public function category()
    {
        $data = array(
            'title' => 'Data Category',
            'dataCategory' => categoryBarang::all(),
        );

        return view('admin.master.category.category' , $data);
    }
    public function store_category(Request $request)
    {
        categoryBarang::create([
            'nama_category' => $request->namaCategory,
        ]);

        return redirect('kategori')->with('success','data berhasil disimpan');
    }

    public function update_category(Request $request, $id)
    {
        categoryBarang::where('id', $id)
        ->where('id', $id)
        ->update([
            'nama_category' => $request->namaCategory,
        ]);

        return redirect('kategori')->with('success','data berhasil diubah');
    }

    public function destroy_category($id)
    {
        categoryBarang::where('id', $id)->delete();
        return redirect('kategori')->with('success','data berhasil dihapus');
    }
}
