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
        Schema::dropIfExists('downloads');
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->integer('event_id');
            $table->date('occurred_at');
            $table->integer('episode_id');
            $table->integer('podcast_id');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downloads');
    }
};
