<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect([
            ['name' => 'infoloker-index'],
            ['name' => 'infoloker-create'],
            ['name' => 'infoloker-update'],
            ['name' => 'infoloker-delete'],

            ['name' => 'role-index'],
            ['name' => 'role-create'],
            ['name' => 'role-update'],
            ['name' => 'role-delete'],

            ['name' => 'lamaran-index'],
            ['name' => 'lamaran-create'],
            ['name' => 'lamaran-update'],
            ['name' => 'lamaran-delete'],

            ])->each(fn ($data) => Permission::create($data));
    }
}
