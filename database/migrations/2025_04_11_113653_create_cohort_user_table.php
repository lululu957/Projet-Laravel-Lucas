<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCohortUserTable extends Migration
{
    public function up()
    {
        Schema::create('cohort_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cohort_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            // Optionnel mais utile pour éviter les doublons
            $table->unique(['cohort_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('cohort_user');
    }
}
