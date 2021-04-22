<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\NguoiDung;
use App\Models\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$role_employee = Role::where('name', 'employee')->first();
		$role_manager  = Role::where('name', 'admin')->first();
		$role_saler = Role::where('name', 'saler')->first();

		$employee = new NguoiDung();
		$employee->name = 'Employee Name';
		$employee->username = 'employeeusername';
		$employee->email = 'employee@example.com';
		$employee->password = bcrypt('123456');
		$employee->save();
		$employee->Role()->attach($role_employee);

		$saler = new NguoiDung();
		$saler->name = 'Saler Name';
		$saler->username = 'salerusername';
		$saler->email = 'saler@example.com';
		$saler->password = bcrypt('123456');
		$saler->save();
		$saler->Role()->attach($role_saler);

		$manager = new NguoiDung();
		$manager->name = 'Admin Name';
		$manager->username = 'adminusername';
		$manager->email = 'admin@example.com';
		$manager->password = bcrypt('123456');
		$manager->save();
		$manager->Role()->attach($role_manager);
    }
}
