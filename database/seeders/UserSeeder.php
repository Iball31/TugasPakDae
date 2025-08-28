<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Hapus data user yang ada sebelumnya untuk menghindari duplikat
        // User::truncate(); // Opsional: jika Anda ingin membersihkan tabel setiap kali seed dijalankan

        // Membuat user baru
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // Ganti 'password' dengan password yang aman
            'email_verified_at' => now(), // Langsung verifikasi email
        ]);

        // Anda bisa menambahkan lebih banyak user di sini jika perlu
        // User::create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        //     'password' => Hash::make('12345678'),
        // ]);
    }
}
