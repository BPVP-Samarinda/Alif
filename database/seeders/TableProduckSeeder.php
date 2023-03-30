<?php

namespace Database\Seeders;

use App\Models\produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TableProduckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'nama' => 'pukis',
                'deskripsi' => 'kue pukis di panggang',
                'harga' => 3_000,
                'stok' => 10, 
            ],
            [
                'nama' => 'pie susu',
                'deskripsi' => 'kue yang di buat rasa susu',
                'harga' => 10_000,
                'stok' => 50, 
            ]
            ];
            foreach($data as $item){
                produk::create($item);
            }
    }
}
