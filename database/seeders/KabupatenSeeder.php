<?php

namespace Database\Seeders;

use App\Models\Kabupaten;
use Illuminate\Database\Seeder;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kabupaten::create([
            'nama_kabupaten' => 'Kabupaten Bolaang Mongondow'
        ]);
    }
}