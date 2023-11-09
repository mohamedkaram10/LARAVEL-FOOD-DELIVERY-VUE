<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Enums\RoleName;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->createAdminUser();
    }

    public function createAdminUser()
    {
        User::create([
            'name'     => 'Admin User',
            'email'    => 'admin@admin.com',
            'password' => bcrypt('password'),
        ])->roles()->sync(Role::where('name', RoleName::ADMIN->value)->first());
    }
}
