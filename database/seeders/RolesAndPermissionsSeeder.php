<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         // Reset cached roles and permissions
         app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        //create a default user 
        $user = User::create([
            'f_name' => 'Admin',
            'l_name' => 'account',
            'email' => 'admin@example.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',// Replace with the desired admin = password
        ]);

         // create permissions
         Permission::create(['name' => 'Pcategory view']);
         Permission::create(['name' => 'Pcategory add']);
         Permission::create(['name' => 'Pcategory update']);
         Permission::create(['name' => 'Pcategory delete']);

         $role = Role::create(['name' => 'super-admin']);
         $role->givePermissionTo(Permission::all());
         $user->assignRole($role);

    }
}
