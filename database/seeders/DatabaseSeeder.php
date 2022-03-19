<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Role::insert([
            ['name' => 'admin', 'display' => 'Admin'],
            ['name' => 'customer', 'display' => 'Customer'],
        ]);

        \App\Models\User::insert([
            ['name'=>'admin','role_id'=>'1','email'=>'admin@gmail.com','number'=>'1234567890','email_verified_at'=>Carbon::now(),'password'=>Hash::make('admin')],
            ['name'=>'shrijal','role_id'=>'2','email'=>'shrijal@gmail.com','number'=>'1234567890','email_verified_at'=>Carbon::now(),'password'=>Hash::make('shrijal')],
        ]);

        \App\Models\Category::insert([
            ['name'=>'dress', 'display'=>'Dress'],
            ['name'=>'bodysuit', 'display'=>'Bodysuit'],
            ['name'=>'coat', 'display'=>'Coat'],
            ['name'=>'jacket', 'display'=>'Jacket'],
            ['name'=>'kimono', 'display'=>'Kimono'],
            ['name'=>'leotard', 'display'=>'Leotard'],
            ['name'=>'pyjamas', 'display'=>'Pyjamas'],
            ['name'=>'skirt', 'display'=>'Skirt'],
            ['name'=>'waistcoat', 'display'=>'Waistcoat'],
            ['name'=>'shawl', 'display'=>'Shawl'],
        ]);
    }
}
