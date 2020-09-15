<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class AdminSeeder extends Seeder
{
  /**
   * Run the database seeds_
   *
   * @return void
   */
  public function run()
  {
    $role = Role::create(['name' => 'Administrador']);
    $role->givePermissionTo('index_product');
    $role->givePermissionTo('new_product');
    $role->givePermissionTo('create_product');
    $role->givePermissionTo('edit_product');
    $role->givePermissionTo('update_product');
    $role->givePermissionTo('destroy_product');

    $role->givePermissionTo('index_user');
    $role->givePermissionTo('new_user');
    $role->givePermissionTo('create_user');
    $role->givePermissionTo('edit_user');
    $role->givePermissionTo('update_user');
    $role->givePermissionTo('destroy_user');

    $role->givePermissionTo('index_move');
    $role->givePermissionTo('new_move');
    $role->givePermissionTo('create_move');
    $role->givePermissionTo('edit_move');
    $role->givePermissionTo('update_move');
    $role->givePermissionTo('destroy_move');

    $role->givePermissionTo('index_provider');
    $role->givePermissionTo('new_provider');
    $role->givePermissionTo('create_provider');
    $role->givePermissionTo('edit_provider');
    $role->givePermissionTo('update_provider');
    $role->givePermissionTo('destroy_provider');

    $role->givePermissionTo('index_report');
    $role->givePermissionTo('new_report');
    $role->givePermissionTo('create_report');
    $role->givePermissionTo('edit_report');
    $role->givePermissionTo('update_report');
    $role->givePermissionTo('destroy_report');

    $role->givePermissionTo('index_cellar');
    $role->givePermissionTo('new_cellar');
    $role->givePermissionTo('create_cellar');
    $role->givePermissionTo('edit_cellar');
    $role->givePermissionTo('update_cellar');
    $role->givePermissionTo('destroy_cellar');
  }
}
