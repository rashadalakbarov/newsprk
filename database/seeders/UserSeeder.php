<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Rashad Alakbarov',
            'username' => 'alakbarovre',
            'email' => 'admin@newsprk.com',
            'status' => 'a20',
            'password' => Hash::make('qasimov24123'),
        ]);
    }
}
