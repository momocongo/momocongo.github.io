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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_event_id');
            $table->string('name');
            $table->dateTime('date_heure_debut');
            $table->dateTime('date_heure_fin');
            $table->string('lieu');
            $table->string('description');
            $table->string('image');
            $table->integer('prix_ticket');
            $table->timestamps();
            $table->foreign('type_event_id')->references('id')->on('type_events');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
};
