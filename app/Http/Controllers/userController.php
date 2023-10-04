<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function index()
    {
        $data = array(
            'title' => 'Data User',
            'dataUser' => User::all(),
        );

        return view('admin.master.user.list',$data);
    }

    public function store(Request $request)
    {
        $data = [
            'name'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ];
        User::create($data);

        return redirect('user')->with('success','data berhasil disimpan');
    }

    public function update(Request $request, $id)
    {
        User::where('id', $id)
        ->where('id', $id)
        ->update([
            'name'     => $request->nama,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return redirect('user')->with('success','data berhasil diubah');
    }

    public function destroy($id)
    {
        User::where('id', $id)->delete();
        return redirect('user')->with('success','data berhasil dihapus');
    }
}
