<?php

namespace Database\Seeders;
use App\Models\Role;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::truncate();

        Role::create(['name' => 'admin']);
        Role::create(['name' => 'officer']);
        Role::create(['name' => 'user']);
    }
}
