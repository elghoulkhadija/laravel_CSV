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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('nom_p');
            $table->string('imag_p')->nullable();
            $table->decimal('prix_p', 10, 2)->nullable();
            $table->unsignedTinyInteger('Pourcentage_reduction')->nullable();
            $table->unsignedInteger('nb_vente')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
