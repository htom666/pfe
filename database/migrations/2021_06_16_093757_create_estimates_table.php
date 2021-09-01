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
            $table->string('company_phone');
            $table->date('estimate_date');
            $table->date('expiration_date');
            $table->boolean('status')->default(0);
            $table->string('client_id');
            $table->double('tva');
            $table->double('tax');
            $table->double('ttc');
            $table->double('pht');
            $table->boolean('closed')->default(0);
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
        Schema::dropIfExists('estimates');
    }
}
