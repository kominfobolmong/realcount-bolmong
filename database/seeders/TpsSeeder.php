<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TpsSeeder extends Seeder
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
                'desa_id' => '1',
                'nama_tps' => 'TPS 1',
                'total_dpt' => '200',
            ],
            [
                'desa_id' => '1',
                'nama_tps' => 'TPS 2',
                'total_dpt' => '150',
            ],
            [
                'desa_id' => '4',
                'nama_tps' => 'TPS 1',
                'total_dpt' => '55',
            ],
            [
                'desa_id' => '4',
                'nama_tps' => 'TPS 2',
                'total_dpt' => '100',
            ],
            [
                'desa_id' => '7',
                'nama_tps' => 'TPS 1',
                'total_dpt' => '150',
            ],
            [
                'desa_id' => '7',
                'nama_tps' => 'TPS 2',
                'total_dpt' => '70',
            ],
        ];

        DB::table('tps')->insert($data);
    }
}
