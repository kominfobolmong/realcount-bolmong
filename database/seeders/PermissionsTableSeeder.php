<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permission for roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        //permission for permissions
        Permission::create(['name' => 'permissions.index']);

        //permission for users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);

        // permission for kabupaten
        Permission::create(['name' => 'kabupaten.index']);
        Permission::create(['name' => 'kabupaten.create']);
        Permission::create(['name' => 'kabupaten.edit']);
        Permission::create(['name' => 'kabupaten.delete']);

        // permission for kecamatan
        Permission::create(['name' => 'kecamatan.index']);
        Permission::create(['name' => 'kecamatan.create']);
        Permission::create(['name' => 'kecamatan.edit']);
        Permission::create(['name' => 'kecamatan.delete']);

        // permission for desa
        Permission::create(['name' => 'desa.index']);
        Permission::create(['name' => 'desa.create']);
        Permission::create(['name' => 'desa.edit']);
        Permission::create(['name' => 'desa.delete']);

        // permission for tps
        Permission::create(['name' => 'tps.index']);
        Permission::create(['name' => 'tps.create']);
        Permission::create(['name' => 'tps.edit']);
        Permission::create(['name' => 'tps.delete']);

        // permission for tipe pemilihan
        Permission::create(['name' => 'tipe-pemilihan.index']);
        Permission::create(['name' => 'tipe-pemilihan.create']);
        Permission::create(['name' => 'tipe-pemilihan.edit']);
        Permission::create(['name' => 'tipe-pemilihan.delete']);

        // permission for paslon
        Permission::create(['name' => 'paslon.index']);
        Permission::create(['name' => 'paslon.create']);
        Permission::create(['name' => 'paslon.edit']);
        Permission::create(['name' => 'paslon.delete']);

        // permission for hasil gubernur
        Permission::create(['name' => 'hasil-gubernur.index']);
        Permission::create(['name' => 'hasil-gubernur.create']);
        Permission::create(['name' => 'hasil-gubernur.edit']);
        Permission::create(['name' => 'hasil-gubernur.delete']);

        // permission for hasil bupati
        Permission::create(['name' => 'hasil-bupati.index']);
        Permission::create(['name' => 'hasil-bupati.create']);
        Permission::create(['name' => 'hasil-bupati.edit']);
        Permission::create(['name' => 'hasil-bupati.delete']);

        // permission for log aktivitas
        Permission::create(['name' => 'log-aktivitas.index']);
        Permission::create(['name' => 'log-aktivitas.create']);
        Permission::create(['name' => 'log-aktivitas.edit']);
        Permission::create(['name' => 'log-aktivitas.delete']);

        Permission::create(['name' => 'koperasi.index']);
        Permission::create(['name' => 'koperasi.create']);
        Permission::create(['name' => 'koperasi.edit']);
        Permission::create(['name' => 'koperasi.delete']);

        Permission::create(['name' => 'ukm.index']);
        Permission::create(['name' => 'ukm.create']);
        Permission::create(['name' => 'ukm.edit']);
        Permission::create(['name' => 'ukm.delete']);
    }
}
