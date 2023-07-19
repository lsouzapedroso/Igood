<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponte_classes_all', function (Blueprint $table) {
            $table->id();
            $table->integer("class_id");
            $table->string("name");
            $table->integer("situation");
            $table->integer("modalidade_id");
            $table->string("modalidade");
            $table->string("time");
            $table->boolean('check');
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
        Schema::dropIfExists('sponte_classes_all');
    }
};
