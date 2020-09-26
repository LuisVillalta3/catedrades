<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovementsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('movements', function (Blueprint $table) {
      $table->id();
      $table->bigInteger('provider_id')->unsigned()->nullable();
      $table->bigInteger('cellar_id')->unsigned()->nullable();
      $table->bigInteger('product_id')->unsigned()->nullable();
      $table->bigInteger('qty')->unsigned()->nullable(1);
      $table->decimal('cost', 50, 2)->nullable()->default(0);
      $table->tinyInteger('type')->default(0);
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
    Schema::dropIfExists('movements');
  }
}
