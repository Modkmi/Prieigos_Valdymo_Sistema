<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('rooms')->insert([
            'Name' => str_random(10),
            'Floor' => rand(1,16),
        ]);
    }
}
