<?php

use Illuminate\Database\Seeder;
use App\Admin;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        	'email' => 'admin@admin.com',
        	'password' => bcrypt(123456),
        	'fullname' => 'VeggieBox Admin'
        ]);
    }
}
