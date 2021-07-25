<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('factures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('invoice_number');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('company_phone');
            $table->date('invoice_date');
            $table->string('client_id');
            $table->double('tva');
            $table->double('tax');
            $table->double('ttc');
            $table->double('pht');
            $table->double('rest_to_pay');
            $table->date('expiration_date');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('factures');
    }
}
