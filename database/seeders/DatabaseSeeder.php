<?php

namespace Database\Seeders;

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
        // \App\Models\User::factory(10)->create();
        $data = [
            'name' => 'Linh Tran',
            'email' => 'tranlinh0911@gmail.com',
            'password' => bcrypt('12345'),

        ];
        DB::table('users')->insert($data);
    }
}
