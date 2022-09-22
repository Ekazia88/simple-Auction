<?php
namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Laravel\Jetstream\Rules\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('users')->insert([
            'username' => 'Admin1',
            'name' => 'Admin1',
            'email' => 'admin1@admin.com',
            'level' => 'admin',
            'password' => bcrypt('admin123')
        ]);
    }
}
