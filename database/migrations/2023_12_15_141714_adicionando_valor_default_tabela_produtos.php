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
        Schema::table("produtos", function(Blueprint $table) {
            $table->integer("quantidadeEstoque")->default(0)->change();
            $table->integer("preco")->default(0)->change();
            $table->integer("categoria_id")->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
