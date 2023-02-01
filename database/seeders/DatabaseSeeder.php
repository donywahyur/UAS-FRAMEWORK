<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;


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
        for($i = 1; $i <= 9; $i++) {
            DB::table('m_user')->insert([
                'username' => '4968000' . sprintf('%04d',$i),
                'password' => bcrypt('4968000' . sprintf('%04d',$i)),
                'nama' => 'Pelanggan Coba ' . $i,
                'no_telp' => '08112345678'.$i,
                'alamat' => 'Jl. Coba ' . $i,
                'role_id' => 4,
                'status' => 1,
                'created_by' => 1,
                'created_at' => now(),
            ]);
        }
        DB::table('m_user')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'nama' => 'Administrator',
            'no_telp' => '',
            'alamat' => '',
            'role_id' => 1,
            'status' => 1,
            'created_by' => 1,
            'created_at' => now(),
        ]);
        DB::table('m_user')->insert([
            'username' => 'pma',
            'password' => bcrypt('pma'),
            'nama' => 'Pencatat Meter Air',
            'no_telp' => '',
            'alamat' => '',
            'role_id' => 2,
            'status' => 1,
            'created_by' => 1,
            'created_at' => now(),
        ]);
        DB::table('m_user')->insert([
            'username' => 'kasir',
            'password' => bcrypt('kasir'),
            'nama' => 'Kasir',
            'no_telp' => '',
            'alamat' => '',
            'role_id' => 3,
            'status' => 1,
            'created_by' => 1,
            'created_at' => now(),
        ]);
    }
}
