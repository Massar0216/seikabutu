<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use DateTime;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tags')->insert([
            ['name' => '星空', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '海浜', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '展望台', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '山', 'created_at' => now(), 'updated_at' => now()],
            ['name' => '都会夜景', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'PA系', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
