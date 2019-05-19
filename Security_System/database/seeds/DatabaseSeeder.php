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

        //factory(App\User::class, 10)->create();

        $rooms = App\Room::all();

        App\User::all()->each(function ($user) use ($rooms){
            $user->rooms()->attach(
                $rooms->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
