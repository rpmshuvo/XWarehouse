<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create invoice']);
        Permission::create(['name' => 'create employee']);
        Permission::create(['name' => 'delete employee']);
        Permission::create(['name' => 'edit employee']);
        Permission::create(['name' => 'create category']);
        Permission::create(['name' => 'edit category']);
        Permission::create(['name' => 'detele category']);
        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'salesman']);
        $role->givePermissionTo('create invoice');

        // or may be done by chaining
        $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['create invoice', 'create category','edit category','detele category','create product','edit product','delete product']);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());

        //create user
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
        ]);
        $user->assignRole('admin');
    }
}
