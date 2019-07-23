<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_stats', function (Blueprint $table) {
            $table->bigInteger('post_id')->unsigned();
            $table->primary('post_id');
            $table->foreign('post_id')->references('id')->on('posts');

            $table->bigInteger('views')->unsigned()->default(0);
            $table->bigInteger('comment')->unsigned()->default(0);
            $table->bigInteger('likes')->unsigned()->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_stats');
    }
}
