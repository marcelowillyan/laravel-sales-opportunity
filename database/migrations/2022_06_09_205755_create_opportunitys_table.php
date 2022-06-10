<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOpportunitysTable extends Migration
{
    public function up()
    {
        Schema::create('opportunitys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('slug')->inique();
            $table->text('price')->nullable();
            $table->text('seller')->nullable();
            $table->enum('status', array('0','1','2'))->default('0');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('opportunitys');
    }
}
