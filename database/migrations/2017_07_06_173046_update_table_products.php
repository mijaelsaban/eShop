<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTableProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
              // agregar columna
            $table->string('category_id');
            //borrar columna
            // $table->dropColumn('price');
            // cambiar un atributo de la columna
            // $table->string('title', 255)->change();
            // cambiar el nombre de una columna
            // $table->renameColumn('name', 'title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            //
        });
    }
}
