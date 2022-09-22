<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'admin' => 'Admin@level.com',
            'password' => bcrypt('admin2020')
        ]);
        $admin->assignLevel('admin');

        $officer = User::create([
            'name' => 'Taqim',
            'admin' => 'Taqim@gmail.com',
            'password' => bcrypt('officer2020')
        ]);
        $admin->assignLevel('admin');
        
        $user = User::create([
            'name' => 'User',
            'admin' => 'user@level.com',
            'password' => bcrypt('user2020')
        ]);
        
        $admin->assignLevel('admin');
        }

    
}
