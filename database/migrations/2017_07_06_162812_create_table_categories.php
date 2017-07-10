<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCategories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name', 120);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}


//migrate    hace la migracion!
//make:migration create_table_products --create=products
//make:migration update_table_products --table=products

// php artisan make:seeder UsersTableSeeder
// php artisan db:seed

//para cambiar nombre de columna
//composer require doctrine\bal

//usar composer mercado pago mercado pago para bajar la libreria
//
