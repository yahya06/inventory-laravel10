<?php

namespace App\Http\Controllers;

use App\Models\supply;
use Illuminate\Http\Request;

class supplyerController extends Controller
{
    function index(){
        $data = array(
            'title' => 'Supplyer',
            'dataSupplyer' => supply::all(),
        );
        return view('admin.master.user.supp',$data);
    }
    public function store(Request $request)
    {
        $data = [
            'nama_supplier'   => $request->nama_supplier,
            'jenis_supplier'  => $request->jenis_supplier,
            'keterangan'      => $request->keterangan,
        ];
        supply::create($data);

        return redirect('supplyer')->with('success','data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'nama_supplier'   => $request->nama_supplier,
            'jenis_supplier'  => $request->jenis_supplier,
            'keterangan'      => $request->keterangan,
        ];
        supply::where('id', $id)
        ->where('id', $id)
        ->update($data);

        return redirect('supplyer')->with('success','data berhasil diubah');
    }

    public function destroy($id)
    {
        supply::where('id', $id)->delete();
        return redirect('supplyer')->with('success','data berhasil dihapus');
    }
}
