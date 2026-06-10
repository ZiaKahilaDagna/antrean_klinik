<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Admin
        User::updateOrCreate(
            ['email' => 'admin@klinik.com'],
            [
                'name' => 'Admin Utama',
                'password' => bcrypt('password'),
                'role' => 'admin',
                'dokter_id' => null,
            ]
        );

        // Dokter 1 - dr. Anita (dokter_id = 3 sesuai tabel dokter)
        User::updateOrCreate(
            ['email' => 'anita@klinik.com'],
            [
                'name' => 'dr. Anita Wijaya, Sp.PD',
                'password' => bcrypt('password'),
                'role' => 'dokter',
                'dokter_id' => 3,
            ]
        );

        // Dokter 2 - dr. Rudi (dokter_id = 5)
        User::updateOrCreate(
            ['email' => 'rudi@klinik.com'],
            [
                'name' => 'dr. Rudi Hartono, Sp.JP',
                'password' => bcrypt('password'),
                'role' => 'dokter',
                'dokter_id' => 5,
            ]
        );

        // Dokter 3 - dr. Marvel (dokter_id = 7)
        User::updateOrCreate(
            ['email' => 'marvel@klinik.com'],
            [
                'name' => 'dr. Marvel S.H',
                'password' => bcrypt('password'),
                'role' => 'dokter',
                'dokter_id' => 7,
            ]
        );

        // Dokter 4 - dr. Wijaya (dokter_id = 9)
        User::updateOrCreate(
            ['email' => 'wijaya@klinik.com'],
            [
                'name' => 'dr. Wijaya Kusuma S.g',
                'password' => bcrypt('password'),
                'role' => 'dokter',
                'dokter_id' => 9,
            ]
        );
    }
}