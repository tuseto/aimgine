<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWhoareweTestimonialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('whoarewe_testimonials', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name');
            $table->string('person_name');
            $table->string('position');
            $table->text('description');
            $table->tinyInteger('onHome')->default(0);
            $table->string('image');
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
        Schema::dropIfExists('whoarewe_testimonials');

    }
}
