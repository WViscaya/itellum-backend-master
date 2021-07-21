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
            $table->string('first_name');
            $table->string('last_name');
            $table->string('account_type');
            $table->string('number_id');
            $table->string('email');
            $table->string('phone');
            $table->integer('country_id');
            $table->integer('province_id');
            $table->integer('canton_id');
            $table->integer('city_id');
            $table->text('address1');
            $table->text('address2');
            $table->integer('postal_code');
            $table->string('username');
            $table->string('password');
            $table->boolean('active');
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
