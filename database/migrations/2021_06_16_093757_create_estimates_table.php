<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstimatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estimates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('estimate_number');
            $table->string('company_name');
            $table->string('company_address');
            $table->string('logo')->nullable();
            $table->string('company_phone');
            $table->date('estimate_date');
            $table->string('client_id');
            $table->double('tva');
            $table->double('tax');
            $table->double('ttc');
            $table->double('pht');
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
        Schema::dropIfExists('estimates');
    }
}
