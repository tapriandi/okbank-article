<?php

use App\Models\Category;
use App\User;
use Illuminate\Database\Seeder;
use Backpack\PermissionManager\app\Models\Role;
use Backpack\PermissionManager\app\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     SuitcaseDefaultSeeder::class,
        // ]);
        $user_admin = User::create(['name' => 'User Admin', 'email' => 'tapriandi@gmail.com', 'password' => bcrypt('password')]);
        $financial_category = Category::create(['name' => 'Finansial']);
        $karir_category = Category::create(['name' => 'Karir & Sukses']);
        $hidup_category = Category::create(['name' => 'Gaya Hidup']);

        $perm_access_cms = Permission::create(['guard_name' => 'backpack', 'name' => 'access cms']);
        $perm_manage_admin = Permission::create(['guard_name' => 'backpack', 'name' => 'manage admin']);
        $perm_manage_users = Permission::create(['guard_name' => 'backpack', 'name' => 'manage users']);
        $perm_manage_static_contents = Permission::create(['guard_name' => 'backpack', 'name' => 'manage static contents']);

        $role_super_admin = Role::create(['guard_name' => 'backpack', 'name' => 'Super Admin']);
        $role_admin = Role::create(['guard_name' => 'backpack', 'name' => 'Admin']);

        $role_super_admin->permissions()->save($perm_access_cms);
        $role_admin->permissions()->save($perm_access_cms);

        $role_super_admin->permissions()->save($perm_manage_admin);
        $role_super_admin->permissions()->save($perm_manage_users);

        $role_super_admin->permissions()->save($perm_manage_static_contents);
        $role_admin->permissions()->save($perm_manage_static_contents);

        $role_super_admin->users()->save($user_admin);
    }
}
