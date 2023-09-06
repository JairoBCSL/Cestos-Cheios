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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('membro_id');
            $table->foreign('membro_id')->references('id')->on('membros');
            $table->float('valor_entregue', 8, 2);
            $table->float('troco', 8, 2);
            $table->float('valor_final', 8, 2);
            $table->unsignedBigInteger('obreiro_id');
            $table->foreign('obreiro_id')->references('id')->on('users');
            $table->dateTime('data_oferta');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ofertas', function(Blueprint $table){
            $table->dropForeign('ofertas_membro_id_foreign');
            $table->dropForeign('ofertas_obreiro_id_foreign');
        });

        Schema::dropIfExists('ofertas');
    }
};
