<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produits', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->tinyInteger("type_id");
            $table->string("sub_title")->nullable();
            // $table->string("description")->nullable();
            $table->string("thumbnail");
            $table->tinyInteger("released")->default(0);            
            $table->integer("quantity");
            $table->integer("nbKilo");
            $table->integer("nbSac");
            $table->integer("price");
            $table->integer("total");	
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produits');
    }
};
