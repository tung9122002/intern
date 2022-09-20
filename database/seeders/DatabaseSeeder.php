<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            'name' => "Poly",
            'email' => 'poly@gmail.com',
            'hinh_anh'=>'1.jpg',
            'sdt'=>'0392725483',
            'dia_chi'=>'Thạch Thất',
            'id_role'=>1,
            'password' => Hash::make('123456'),
        ]);
    }
}
