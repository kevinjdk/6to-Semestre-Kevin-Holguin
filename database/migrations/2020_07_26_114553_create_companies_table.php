<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('pgsql-bolsa_empleo')->create('companies', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->constrained('authentication.users');
            $table->string('identity');
            $table->string('nature');
            $table->string('email');
            $table->string('trade_name',300);
            $table->string('comercial_activity',500);
            $table->string('phone');
            $table->string('cell_phone')->nullable();
            $table->string('web_page')->nullable();
            $table->string('address');
            $table->string('state')->default('ACTIVE');
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
        Schema::connection('pgsql-bolsa_empleo')->dropIfExists('companies');
    }
}
