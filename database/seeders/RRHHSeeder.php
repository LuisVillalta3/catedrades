<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RRHHSeeder extends Seeder
{
  /**
   * Run the database seeds_
   *
   * @return void
   */
  public function run()
  {
    $role = Role::create(['name' => 'RRHH']);
    $role->givePermissionTo('index_user');
    $role->givePermissionTo('new_user');
    $role->givePermissionTo('create_user');
    $role->givePermissionTo('edit_user');
    $role->givePermissionTo('update_user');
    $role->givePermissionTo('destroy_user');

    $role->givePermissionTo('index_report');
    $role->givePermissionTo('new_report');
    $role->givePermissionTo('create_report');
    $role->givePermissionTo('edit_report');
    $role->givePermissionTo('update_report');
    $role->givePermissionTo('destroy_report');
  }
}
