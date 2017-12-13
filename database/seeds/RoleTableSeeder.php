<?php

use Illuminate\Database\Seeder;
use App\Role;
class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_employee = new Role();
      $role_employee->name = 'Administator';
      $role_employee->save();

      $role_manager = new Role();
      $role_manager->name = 'Advertiser';
      $role_manager->save();

      $role_manager = new Role();
      $role_manager->name = 'Linkowner';
      $role_manager->save();
    }
}
