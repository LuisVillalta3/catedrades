<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ProviderSeeder extends Seeder
{
  /**
   * Run the database seeds_
   *
   * @return void
   */
  public function run()
  {
    $role = Role::create(['name' => 'Encargado de proveedores']);
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
  }
}
