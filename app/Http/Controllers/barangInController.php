<?php

namespace App\Http\Controllers;

use App\Models\barang;
use App\Models\barangIn;
use App\Models\supply;
use Illuminate\Http\Request;

class barangInController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data Barang Masuk',
            'dataBarang' => barang::all(),
            'dataSupp' => supply::all(),
            'dataBarangIn' => barangIn::join('barang','barang.id', '=', 'barang_in.id_barang')
                                    ->join('supplier','supplier.id', '=', 'barang_in.id_supp')
                                    ->select('barang_in.*', 'barang.nama_barang', 'supplier.nama_supplier')
                                    ->get(),
        );

        return view('kasir.transaksi.barang_in' , $data);
    }
}
