<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Illuminate\Http\Request;

class customerController extends Controller
{
    function index(){
        $data = array(
            'title' => 'Customer',
            'dataCustomer' => customer::all(),
        );
        return view('admin.master.user.customer',$data);
    }
    public function store(Request $request)
    {
        $data = [
            'namacustomer'   => $request->namaCust,
            'keterangan'      => $request->keterangan,
        ];
        customer::create($data);

        return redirect('customer')->with('success','data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        $data = [
            'namacustomer'   => $request->namaCust,
            'keterangan'      => $request->keterangan,
        ];
        customer::where('id', $id)
        ->where('id', $id)
        ->update($data);

        return redirect('customer')->with('success','data berhasil diubah');
    }

    public function destroy($id)
    {
        customer::where('id', $id)->delete();
        return redirect('customer')->with('success','data berhasil dihapus');
    }
}
