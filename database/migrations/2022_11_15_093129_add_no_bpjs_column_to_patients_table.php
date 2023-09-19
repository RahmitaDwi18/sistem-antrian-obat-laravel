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
        // Schema::table('patients', function (Blueprint $table) {
        //     $table->string('no_bpjs')->after('id')->nullable();
        //     $table->string('code_map')->nullable();
        //     $table->string('address')->nullable();

        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    //     Schema::table('patients', function (Blueprint $table) {
    //         $table->dropColumn('no_bpjs');
    //     });
        
        // Schema::dropIfExists('patients');
    }
};
