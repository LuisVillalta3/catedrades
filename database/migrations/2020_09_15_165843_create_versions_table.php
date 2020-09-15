<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVersionsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('versions', function (Blueprint $table) {
      $table->id();
      $table->string('action');
      $table->bigInteger('user_id')->unsigned()->nullable();
      $table->bigInteger('versionable_id')->unsigned();
      $table->string('versionable_type');
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
    Schema::dropIfExists('versions');
  }
}
