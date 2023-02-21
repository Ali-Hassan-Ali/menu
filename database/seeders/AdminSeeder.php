<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'     => 'admin',
            'email'=> 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);

        Admin::create([
            'name' => 'super_admin',
            'email'=> 'admin@admin.com',
            'password' => bcrypt('123456'),
        ]);
        
    }//end of run

}//end of class