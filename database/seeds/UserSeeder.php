<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        DB::table('users')->insert([
            'name' => "Administrator",
            'email' => "admin".'@gmail.com',
            'password' => Hash::make('adminadmin'), // https://laravel.com/docs/7.x/hashing
            'role' => 'admin',
        ]);
        DB::table('users')->insert([
            'name' => 'Pembeli Satu',
            'email' => 'pembeli1'.'@gmail.com',
            'password' => Hash::make('pembelipembeli1'), // https://laravel.com/docs/7.x/hashing
            'role' => 'buyer',
        ]);
        DB::table('users')->insert([
            'name' => 'Pembeli Dua',
            'email' => 'pembeli2'.'@gmail.com',
            'password' => Hash::make('pembelipembeli2'), // https://laravel.com/docs/7.x/hashing
            'role' => 'buyer',
        ]);
        DB::table('users')->insert([
            'name' => 'Pembeli Tiga',
            'email' => 'pembeli3'.'@gmail.com',
            'password' => Hash::make('pembelipembeli3'), // https://laravel.com/docs/7.x/hashing
            'role' => 'buyer',
        ]);
        DB::table('users')->insert([
            'name' => 'Pembeli Empat',
            'email' => 'pembeli4'.'@gmail.com',
            'password' => Hash::make('pembelipembeli4'), // https://laravel.com/docs/7.x/hashing
            'role' => 'buyer',
        ]);
        DB::table('users')->insert([
            'name' => 'Pembeli Lima',
            'email' => 'pembeli5'.'@gmail.com',
            'password' => Hash::make('pembelipembeli5'), // https://laravel.com/docs/7.x/hashing
            'role' => 'buyer',
        ]);
    }
}
