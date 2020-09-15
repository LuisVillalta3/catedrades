<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ProductSeeder extends Seeder
{
  /**
   * Run the database seeds_
   *
   * @return void
   */
  public function run()
  {
    $role = Role::create(['name' => 'Encargado de productos']);
    $role->givePermissionTo('index_product');
    $role->givePermissionTo('new_product');
    $role->givePermissionTo('create_product');
    $role->givePermissionTo('edit_product');
    $role->givePermissionTo('update_product');
    $role->givePermissionTo('destroy_product');

    $role->givePermissionTo('index_move');
    $role->givePermissionTo('new_move');
    $role->givePermissionTo('create_move');
    $role->givePermissionTo('edit_move');
    $role->givePermissionTo('update_move');
    $role->givePermissionTo('destroy_move');

    $role->givePermissionTo('index_report');
    $role->givePermissionTo('new_report');
    $role->givePermissionTo('create_report');
    $role->givePermissionTo('edit_report');
    $role->givePermissionTo('update_report');
    $role->givePermissionTo('destroy_report');
  }
}
