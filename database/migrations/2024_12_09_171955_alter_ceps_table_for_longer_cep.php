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
        Schema::table('ceps', function (Blueprint $table) {
            $table->string('cep', 9)->change(); // Aumenta o tamanho para 9 caracteres
        });
    }

    public function down()
    {
        Schema::table('ceps', function (Blueprint $table) {
            $table->string('cep', 8)->change(); // Volta para 8 caracteres
        });
    }
};
