<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TipePemilihanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'nama_tipe_pemilihan' => 'Gubernur',
            ],
            [
                'nama_tipe_pemilihan' => 'Bupati',
            ],
        ];

        // Insert data ke tabel tipe_pemilihan
        DB::table('tipe_pemilihans')->insert($data);
    }
}
