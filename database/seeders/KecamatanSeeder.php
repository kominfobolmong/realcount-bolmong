<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kabupaten = 1;

        Kecamatan::create([
            'nama_kecamatan' => 'Lolak',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Poigar',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Lolayan',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Passi Timur',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Passi Barat',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Dumoga Utara',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Dumoga Barat',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Dumoga',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Dumoga Tengah',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Dumoga Tenggara',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Dumoga Timur',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Bolaang Timur',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Bolaang',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Sangtombolang',
            'kabupaten_id' => $kabupaten
        ]);

        Kecamatan::create([
            'nama_kecamatan' => 'Bilalang',
            'kabupaten_id' => $kabupaten
        ]);
    }
}
