<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class CellarSeeder extends Seeder
{
  /**
   * Run the database seeds_
   *
   * @return void
   */
  public function run()
  {
    $role = Role::create(['name' => 'Encargado de bodegas']);
    $role->givePermissionTo('index_cellar');
    $role->givePermissionTo('new_cellar');
    $role->givePermissionTo('create_cellar');
    $role->givePermissionTo('edit_cellar');
    $role->givePermissionTo('update_cellar');
    $role->givePermissionTo('destroy_cellar');

    $role->givePermissionTo('index_report');
    $role->givePermissionTo('new_report');
    $role->givePermissionTo('create_report');
    $role->givePermissionTo('edit_report');
    $role->givePermissionTo('update_report');
    $role->givePermissionTo('destroy_report');
  }
}
