<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nilai', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_guru');
            $table->unsignedBigInteger('id_murid');
            $table->unsignedBigInteger('id_mata_pelajaran');
            $table->integer('nilai');
            $table->string('predikat');
            $table->integer('semester');
            $table->timestamps();
        
            // Jika ada foreign key:
            $table->foreign('id_guru')->references('id')->on('guru');
            $table->foreign('id_murid')->references('id')->on('murid');
            $table->foreign('id_mata_pelajaran')->references('id')->on('mata_pelajaran');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai');
    }
};
