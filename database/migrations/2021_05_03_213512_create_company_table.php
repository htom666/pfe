<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->integer('client_id');
            $table->integer('prospect_id');
            $table->string('name');
            $table->string('juridikform');
            $table->string('siret');
            $table->string('apenaf');
            $table->string('tvaintra');
            $table->string('immatricule');
            $table->string('phone');
            $table->string('fax');
            $table->string('adresse');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->string('bank_name');
            $table->string('rib');
            $table->string('iban');
            $table->string('bic');
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
        Schema::dropIfExists('company');
    }
}
