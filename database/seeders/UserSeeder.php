<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        DB::table('users')->insert([
            'name'     => 'admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin'),
            'role'     => 'manajer',
        ]);
        $datauser = [
            'name'     => 'staff',
            'email'    => 'staff@gmail.com',
            'password' => Hash::make('staff'),
            'role'     => 'staff',
        ];
        DB::table('users')->insert($datauser);
        
        $datasupp = [
            'nama_supplier'   => 'bagus',
            'jenis_supplier'  => 'kain',
            'keterangan'      => '-',
        ];
        $datacat =[
            'nama_category' => 'kain',
        ];
        $databarang = [
            'id_category'  => '1',
            'sku' => 'WH-001',
            'nama_barang' => 'kaos',
            'stok_min' => '10',
            'satuan' => 'Kg',
            'harga' => '15000',
            'stok' => '0',
            'kelas' => 'B',
        ];
        $databrgin = [
            'kode_in' =>'bk-1',
            'id_barang' =>'1',
            'id_supp' =>'1',
            'qty' =>'5',
            'keterangan' =>'sd',
        ];
        DB::table('supplier')->insert($datasupp);
        DB::table('category')->insert($datacat);
        DB::table('barang')->insert($databarang);
        DB::table('barang_in')->insert($databrgin);
    }
}
