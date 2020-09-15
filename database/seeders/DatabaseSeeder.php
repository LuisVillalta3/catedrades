<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    // User::factory(10)->create();
    PermissionsSeeder::class;
    AdminSeeder::class;
    ProductSeeder::class;
    ProviderSeeder::class;
    CellarSeeder::class;
    RRHHSeeder::class;
  }
}
