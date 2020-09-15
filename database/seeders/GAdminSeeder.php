<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Version;
use Illuminate\Database\Seeder;

class GAdminSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $user = User::create([
      'name'  =>  'Sysadmin',
      'email' =>  'sysadmin@admin.com',
      'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
    ]);

    $version = new Version([
      'action' => 'create',
      'user_id' => null
    ]);

    $user->assignRole('Administrador');

    $user->versions()->save($version);
  }
}
