<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Entry;

class EntryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = User::all();

        $users->each(function ($user){
            factory(Entry::class, 10)->create([
                'user_id' => $user->id
            ]);
        });

    }
}
