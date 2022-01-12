<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationsToEmployes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('employes', function (Blueprint $table) {
        //     $table->unsignedBigInteger('position_id')->nullable()->after('id');
        //     $table->foreign('position_id')->references('id')->on('positions')
        //     ->onUpdate('cascade')
        //     ->onDelete('set null');
        // });
        Schema::table('contracts', function (Blueprint $table) {
            $table->unsignedBigInteger('employe_id')->nullable()->after('id');
            $table->foreign('employe_id')->references('id')->on('employes')
            ->onUpdate('cascade')
            ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employes', function (Blueprint $table) {
            //
        });
    }
}
