<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class NewPermissionsSeeder extends Seeder
{
  /**
   * Run the database seeds_
   *
   * @return void
   */
  public function run()
  {
    /** Permissions Product **/
    Permission::create(['name' => 'index_trash']);
    Permission::create(['name' => 'recovery_trash']);
    Permission::create(['name' => 'destroy_trash']);
    Permission::create(['name' => 'clear_trash']);

    $role = Role::find(2);
    $role->givePermissionTo('index_trash');
    $role->givePermissionTo('recovery_trash');
    $role->givePermissionTo('destroy_trash');
    $role->givePermissionTo('clear_trash');

    foreach (Role::all() as $nrole) {
      $nrole->givePermissionTo('index_trash');
    }
  }
}
