<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
                $table->id();
                $table->string('civilite');
                $table->string('nom');
                $table->string('prenom');
                $table->string('metier');
                $table->string('email');
                $table->string('city');
                $table->string('state');
                $table->string('zip');
                $table->string('consentement');
                $table->string('telbureau');
                $table->string('portable');
                $table->string('telecopie');
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
        Schema::dropIfExists('clients');
    }
}
