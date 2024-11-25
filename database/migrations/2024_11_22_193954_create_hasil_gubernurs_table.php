<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHasilGubernursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hasil_gubernurs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tps_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreignId('paslon_id')->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->integer('suara_sah');
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
        Schema::dropIfExists('hasil_gubernurs');
    }
}
