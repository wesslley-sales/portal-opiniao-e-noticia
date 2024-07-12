<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            PermissionRoleTableSeeder::class,
            UsersTableSeeder::class,
            RoleUserTableSeeder::class,
            SeetingSeeder::class,
            TypeCategorySeeder::class,
            TypeBannerSeeder::class,
            StateSeeder::class,
            CitySeeder::class,
        ]);
    }
}
