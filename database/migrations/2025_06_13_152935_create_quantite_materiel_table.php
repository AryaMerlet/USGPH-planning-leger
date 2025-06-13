<?php

use App\Classes\Commun\ExtendBlueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Planning\Tache;
use App\Models\Planning\Materiel;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        $schema = DB::getSchemaBuilder();
        $schema->blueprintResolver(function ($table, $callback) {
            return new ExtendBlueprint($table, $callback);
        });

        $schema->create('quantite_materiels', function (ExtendBlueprint $table) {
            $table->id();
            $table->integer('quantite');
            $table->foreignIdFor(Tache::class);
            $table->foreignIdFor(Materiel::class);
            $table->whoAndWhen();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('quantite_materiels');
        Schema::enableForeignKeyConstraints();
    }
};
