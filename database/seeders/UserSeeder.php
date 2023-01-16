<?php

namespace Database\Seeders;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $permissions = Permission::all();
        // 1 = admin dar seeder user
        $role = Role::find('1');
        $role->syncPermissions($permissions);
        $user->assignRole($role);

        $user = User::create([
            'name' => 'pelamar',
            'email' => 'pelamar@gmail.com',
            'password' => bcrypt('password'),
        ]);

        $permissions = Permission::all();
        // 2 = Pelamar dar seeder user
        $role = Role::find('2');
        $role->syncPermissions($permissions);
        $user->assignRole($role);

    }
}
