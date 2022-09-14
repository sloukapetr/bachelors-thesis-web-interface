<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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

        //Seeders
        $this->call([
            RoomSeeder::class,
        ]);
        //Factories
        //\App\Models\User::factory(10)->create();

        $user = new User;
        $user->name = "Admin";
        $user->password = Hash::make('heslo');
        $user->admin = true;
        $user->save();

        $user = new User;
        $user->name = "Josef";
        $user->password = Hash::make('heslo');
        $user->save();

        $user = new User;
        $user->name = "Miroslav";
        $user->password = Hash::make('heslo');
        $user->save();

    }
}
