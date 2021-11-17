<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInwdOtwdQuantityTbl extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inwd_otwd_quantity', function (Blueprint $table) {
            $table->id();
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('category');
            $table->integer('material_id')->unsigned();
            $table->foreign('material_id')->references('id')->on('material');
            $table->date('date');
            $table->decimal('inwd_outwd_qty');
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
        Schema::dropIfExists('inwd_otwd_quantity');
    }
}
