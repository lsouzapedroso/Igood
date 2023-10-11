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
        Schema::create('values_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('classes_id');
            $table->unsignedBigInteger('year_payments_id');
            $table->decimal('anual_cheque', 10, 2)->default(0);
            $table->decimal('credit_card', 10, 2)->default(0);
            $table->decimal('anual_escola', 10, 2)->default(0);
            $table->decimal('materials', 10, 2)->default(0);
            $table->decimal('registration_tax', 10, 2)->default(0);
            $table->decimal('grow_global', 10, 2)->default(0);
            $table->timestamps();

            $table->foreign('classes_id')->references('id')->on('classes');
            $table->foreign('year_payments_id')->references('id')->on('year_payments_reference');
        });

        // Alterar o separador decimal para vírgula
        DB::statement('ALTER TABLE values_courses MODIFY COLUMN anual_cheque DECIMAL(10, 2) UNSIGNED ZEROFILL DEFAULT 0');
        DB::statement('ALTER TABLE values_courses MODIFY COLUMN credit_card DECIMAL(10, 2) UNSIGNED ZEROFILL DEFAULT 0');
        DB::statement('ALTER TABLE values_courses MODIFY COLUMN anual_escola DECIMAL(10, 2) UNSIGNED ZEROFILL DEFAULT 0');
        DB::statement('ALTER TABLE values_courses MODIFY COLUMN materials DECIMAL(10, 2) UNSIGNED ZEROFILL DEFAULT 0');
        DB::statement('ALTER TABLE values_courses MODIFY COLUMN registration_tax DECIMAL(10, 2) UNSIGNED ZEROFILL DEFAULT 0');
        DB::statement('ALTER TABLE values_courses MODIFY COLUMN grow_global DECIMAL(10, 2) UNSIGNED ZEROFILL DEFAULT 0');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('values_courses');
    }
};
