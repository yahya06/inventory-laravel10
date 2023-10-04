<?php

namespace App\Http\Controllers;

use App\Models\barang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    public function category()
    {
        $data = array(
            'title' => 'Data Category',
            'dataCategory' => barang::all(),
        );

        return view('admin.master.category.category' , $data);
    }
    public function store(Request $request)
    {
        barang::create([
            'nama_category' => $request->namaCategory,
        ]);

        return redirect('kategori')->with('success','data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        barang::where('id', $id)
        ->where('id', $id)
        ->update([
            'nama_category' => $request->namaCategory,
        ]);

        return redirect('kategori')->with('success','data berhasil diubah');
    }

    public function destroy($id)
    {
        barang::where('id', $id)->delete();
        return redirect('kategori')->with('success','data berhasil dihapus');
    }
}
