<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => '$2y$10$rad74yUwbLC2hiLIDYgtFui1YN1yoPsPu6g1Qyi/ZdPx.YP5WGnHi'
        ]);
    }
}
