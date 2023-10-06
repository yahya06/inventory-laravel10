<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\categoryBarang;
use App\Models\kelasBarang;
use Illuminate\Http\Request;

class barangController extends Controller
{
    // category
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

    // barang
    public function barang()
    {
        $data = array(
            'title' => 'Data Barang',
            'dataBarang' => barang::all(),
        );

        return view('admin.master.kelas.kelas' , $data);
    }
    public function store_barang(Request $request)
    {
        $barang=[
            'id_category',
            'nama_barang',
            'stok_min',
            'satuan',
            'harga',
            'stok',
            'kelas',
        ];
        barang::create($barang);

        return redirect('barang')->with('success','data berhasil disimpan');
    }

    public function update_barang(Request $request, $id)
    {
        $barang=[
            'id_category',
            'nama_barang',
            'stok_min',
            'satuan',
            'harga',
            'stok',
            'kelas',
        ];
        barang::where('id', $id)
        ->where('id', $id)
        ->update([$barang]);

        return redirect('barang')->with('success','data berhasil diubah');
    }

    public function destroy_barang($id)
    {
        barang::where('id', $id)->delete();
        return redirect('barang')->with('success','data berhasil dihapus');
    }
}
