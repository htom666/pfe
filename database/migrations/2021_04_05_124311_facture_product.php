<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

class FactureProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('facture_products', function (Blueprint $table) {
            $table->integer('facture_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->double('price');
            $table->integer('quantity');
            $table->integer('status')->default(0);
            $table->foreign('facture_id')->references('id')->on('factures')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        //
    }
}
