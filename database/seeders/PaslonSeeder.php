<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaslonSeeder extends Seeder
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
                'nama_paslon' => 'Paslon 1 Gubernur',
                'nama_calon' => 'Calon 1 Gubernur',
                'nama_wakil_calon' => 'Wakil Calon 1 Gubernur',
                'nomor_urut' => '1',
                'foto_url' => 'https://realcount.bolmongkab.go.id/foto.jpg',
                'tipe_pemilihan_id' => '1',
            ],
            [
                'nama_paslon' => 'Paslon 2 Gubernur',
                'nama_calon' => 'Calon 2 Gubernur',
                'nama_wakil_calon' => 'Wakil Calon 2 Gubernur',
                'nomor_urut' => '2',
                'foto_url' => 'https://realcount.bolmongkab.go.id/foto.jpg',
                'tipe_pemilihan_id' => '1',
            ],
            [
                'nama_paslon' => 'Paslon 3 Gubernur',
                'nama_calon' => 'Calon 3 Gubernur',
                'nama_wakil_calon' => 'Wakil Calon 3 Gubernur',
                'nomor_urut' => '3',
                'foto_url' => 'https://realcount.bolmongkab.go.id/foto.jpg',
                'tipe_pemilihan_id' => '1',
            ],
            [
                'nama_paslon' => 'Paslon 1 Bupati',
                'nama_calon' => 'Calon 1 Bupati',
                'nama_wakil_calon' => 'Wakil Calon 1 Bupati',
                'nomor_urut' => '1',
                'foto_url' => 'https://realcount.bolmongkab.go.id/foto.jpg',
                'tipe_pemilihan_id' => '2',
            ],
            [
                'nama_paslon' => 'Paslon 2 Bupati',
                'nama_calon' => 'Calon 2 Bupati',
                'nama_wakil_calon' => 'Wakil Calon 2 Bupati',
                'nomor_urut' => '2',
                'foto_url' => 'https://realcount.bolmongkab.go.id/foto.jpg',
                'tipe_pemilihan_id' => '2',
            ],
            [
                'nama_paslon' => 'Paslon 3 Bupati',
                'nama_calon' => 'Calon 3 Bupati',
                'nama_wakil_calon' => 'Wakil Calon 3 Bupati',
                'nomor_urut' => '3',
                'foto_url' => 'https://realcount.bolmongkab.go.id/foto.jpg',
                'tipe_pemilihan_id' => '2',
            ],
        ];

        DB::table('paslons')->insert($data);
    }
}
