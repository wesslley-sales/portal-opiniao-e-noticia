<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('key');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
