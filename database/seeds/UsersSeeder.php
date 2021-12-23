<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        //     'id' => 1,
        //     'name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => 'Admin',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        // DB::table('users')->insert([
        //     'id' => 2,
        //     'name' => 'Siswa',
        //     'no_induk' => '3212312404980001',
        //     'email' => 'siswa@gmail.com',
        //     'password' => Hash::make('12345678'),
        //     'role' => 'siswa',
        //     'created_at' => date('Y-m-d H:i:s'),
        //     'updated_at' => date('Y-m-d H:i:s')
        // ]);

        DB::table('users')->insert([
            'id' => 3,
            'name' => 'Guru',
            'id_card' => '2020',
            'email' => 'guru@gmail.com',
            'password' => Hash::make('12345678'),
            'role' => 'guru',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
