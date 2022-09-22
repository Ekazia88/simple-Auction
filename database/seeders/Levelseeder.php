<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Level;

class Levelseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Level::create([
            'level' => 'admin',
            'guard-name' => 'web'
        ]);

        Level::create([
            'level' => 'officer',
            'guard-name' => 'web',
        ]);

    
        Level::create([
            'level' => 'user',
            'guard-name' => 'web',
        ]);
    }
}
