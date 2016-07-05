<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
      Schema::create('videos', function (Blueprint $table) {
          $table->increments('id');
          $table->string('title');
          $table->string('description');
          $table->string('filename');
          $table->string('video_path');
          $table->string('thumbnail_path');
          $table->string('status');
          $table->integer('user_id');
          $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
      Schema::drop('videos');
  }
}
