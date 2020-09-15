<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProvidersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('providers', function (Blueprint $table) {
      $table->id();
      $table->string('name')->nullable()->default('');
      $table->string('email')->nullable()->default('');
      $table->string('phone')->nullable()->default('');
      $table->string('fax')->nullable()->default('');
      $table->text('ubication');
      $table->timestamps();
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
    Schema::dropIfExists('providers');
  }
}
