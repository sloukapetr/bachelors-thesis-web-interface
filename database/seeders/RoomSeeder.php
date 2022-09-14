<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

//Models
use App\Models\Room;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $room = new Room;
        $room->name = 'Obývací pokoj';
        $room->save();

        $room = new Room;
        $room->name = 'Kuchyně';
        $room->save();

        $room = new Room;
        $room->name = 'Jídelna';
        $room->save();

        $room = new Room;
        $room->name = 'Koupelna';
        $room->save();

        $room = new Room;
        $room->name = 'Dětský pokoj';
        $room->floor = 2;
        $room->save();

        $room = new Room;
        $room->name = 'Ložnice';
        $room->floor = 2;
        $room->save();

        $room = new Room;
        $room->name = 'Koupelna 2';
        $room->floor = 2;
        $room->save();
    }
}
