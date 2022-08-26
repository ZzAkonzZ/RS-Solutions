<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('address');
            $table->string('post_index');
            $table->string('company_phone');
            $table->string('email');
            $table->string('bin');
            $table->string('iik');
            $table->string('bank_name');
            $table->string('bik');
            $table->string('ceo_name');
            $table->string('responsible_person');
            $table->string('responsible_person_phone');
            $table->string('responsible_person_email');
            $table->string('domen');
            $table->string('certificate');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('companies');
    }
};
