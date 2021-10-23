<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama' => 'Mufti Restu Mahesa',
            'role' => 'ADMIN',
            'email' => 'mufti.restumahesa@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'M. Daffa Alfajri',
            'role' => 'SISWA',
            'kelas' => 'X',
            'asal_sekolah' => 'SMAN 2 Bengkulu',
            'alamat' => 'UNIB Belakang',
            'email' => 'daffa@gmail.com',
            'password' => Hash::make('password')
        ]);

        User::create([
            'nama' => 'Yahya Masykur Nurhamdi',
            'role' => 'GURU',
            'asal_sekolah' => 'SMAN 2 Bengkulu',
            'alamat' => 'UNIB Depan',
            'email' => 'yahya@gmail.com',
            'password' => Hash::make('password')
        ]);
    }
}
