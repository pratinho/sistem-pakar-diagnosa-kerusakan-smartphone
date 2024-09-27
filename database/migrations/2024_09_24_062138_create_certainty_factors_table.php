<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('certainty_factors', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kerusakan');
            $table->string('kode_gejala');
            $table->float('mb');  // Measure of Belief
            $table->float('md');  // Measure of Disbelief
            $table->timestamps();
        });
    }
    
};
