<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_patient')->references('id_patient')->on('regist_patients');            
            $table->foreignId('id_poly')->references('id_poly')->on('polies')->cascadeOnDelete()->cascadeOnUpdate();
            $table->integer('no_queue');
            $table->Biginteger('no_bpjs');
            $table->string('name', 50);
            $table->text('address', 255);
            $table->char('gender', 1);
            $table->integer('age');
            $table->string('code_map', 50);
            $table->text('symptom');
            $table->text('recipe')->nullable();
            $table->text('status', 255)->default('belum');
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
        Schema::dropIfExists('patients');
    }
};
