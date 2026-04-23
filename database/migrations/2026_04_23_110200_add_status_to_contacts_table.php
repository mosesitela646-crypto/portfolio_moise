<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Exécute la migration pour ajouter la colonne status.
     */
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            // Ajoute la colonne après le champ 'phone'
            // 'Nouveau' sera la valeur par défaut pour chaque nouveau message
            $table->string('status')->default('Nouveau')->after('phone');
        });
    }

    
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};