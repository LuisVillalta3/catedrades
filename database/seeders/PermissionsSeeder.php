<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
  /**
   * Run the database seeds_
   *
   * @return void
   */
  public function run()
  {
    /** Permissions Product **/
    Permission::create(['name' => 'index_product']);
    Permission::create(['name' => 'new_product']);
    Permission::create(['name' => 'create_product']);
    Permission::create(['name' => 'edit_product']);
    Permission::create(['name' => 'update_product']);
    Permission::create(['name' => 'destroy_product']);

    /** Permissions Users **/
    Permission::create(['name' => 'index_user']);
    Permission::create(['name' => 'new_user']);
    Permission::create(['name' => 'create_user']);
    Permission::create(['name' => 'edit_user']);
    Permission::create(['name' => 'update_user']);
    Permission::create(['name' => 'destroy_user']);

    /** Permissions Movements **/
    Permission::create(['name' => 'index_move']);
    Permission::create(['name' => 'new_move']);
    Permission::create(['name' => 'create_move']);
    Permission::create(['name' => 'edit_move']);
    Permission::create(['name' => 'update_move']);
    Permission::create(['name' => 'destroy_move']);

    /** Permissions Providers **/
    Permission::create(['name' => 'index_provider']);
    Permission::create(['name' => 'new_provider']);
    Permission::create(['name' => 'create_provider']);
    Permission::create(['name' => 'edit_provider']);
    Permission::create(['name' => 'update_provider']);
    Permission::create(['name' => 'destroy_provider']);

    Permission::create(['name' => 'index_cellar']);
    Permission::create(['name' => 'new_cellar']);
    Permission::create(['name' => 'create_cellar']);
    Permission::create(['name' => 'edit_cellar']);
    Permission::create(['name' => 'update_cellar']);
    Permission::create(['name' => 'destroy_cellar']);

    /** Permissions Reports **/
    Permission::create(['name' => 'index_report']);
    Permission::create(['name' => 'new_report']);
    Permission::create(['name' => 'create_report']);
    Permission::create(['name' => 'edit_report']);
    Permission::create(['name' => 'update_report']);
    Permission::create(['name' => 'destroy_report']);
  }
}
