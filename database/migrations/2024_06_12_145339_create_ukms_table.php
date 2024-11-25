<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUkmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ukms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('nama_perusahaan');
            $table->string('slug');
            $table->string('nama_pemilik');
            $table->string('nib')->unique();
            $table->enum('jekel', ['L', 'P'])->nullable();
            $table->integer('naker')->default(0)->nullable();
            $table->integer('aset')->default(0)->nullable();
            $table->integer('omset')->default(0)->nullable();
            $table->integer('modal')->default(0)->nullable();
            $table->tinyText('keterangan')->nullable();
            $table->tinyText('jenis_usaha')->nullable();
            $table->tinyText('alamat')->nullable();
            $table->string('no_telp')->nullable();
            $table->year('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ukms');
    }
}
