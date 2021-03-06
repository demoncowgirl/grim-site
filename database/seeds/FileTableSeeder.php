<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FileTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('files')->insert(['name' => 'BobOBerkman', 'file' => 'BobOBerkman.jpg', 'title' => 'Bob Oedy by Jason Berkman', 'type' => 'jpg', 'extension' => '.jpg', 'user_id' => 'Demoncowgirl' ]);
      DB::table('files')->insert(['name' => 'EvilTracy1', 'file' => 'EvilTracy1.jpg', 'title' => 'Photo by Evil Tracy', 'type' => 'jpg', 'extension' => '.jpg', 'user_id' => 'Demoncowgirl'  ]);
      DB::table('files')->insert(['name' => 'PrettyInPink', 'file' => 'PrettyInPink.jpg', 'title' => 'Pretty In Pink', 'type' => 'jpg', 'extension' => '.jpg', 'user_id' => 'Demoncowgirl'  ]);
      DB::table('files')->insert(['name' => 'WarpedTour2018', 'file' => 'WarpedTour2018.jpg', 'title' => 'The Grim at Warped Tour 2018', 'type' => 'jpg', 'extension' => '.jpg', 'user_id' => 'Demoncowgirl'  ]);
      DB::table('files')->insert(['name' => 'EarlyDays', 'file' => 'EarlyDays.jpg', 'title' => 'Early Days', 'type' => 'jpg', 'extension' => '.jpg', 'user_id' => 'Demoncowgirl'  ]);
      DB::table('files')->insert(['name' => 'NuclearWorldOrder', 'file' => 'NuclearWorldOrder.jpg', 'title' => 'Nuclear World Order', 'type' => 'jpg', 'extension' => '.jpg', 'user_id' => 'Demoncowgirl'  ]);
      DB::table('files')->insert(['name' => 'CopKiller', 'file' => 'CopKiller.mp3','title' => 'Cop Killer', 'type' => 'mp3', 'extension' => '.mp3', 'user_id' => 'Demoncowgirl'  ]);
      DB::table('files')->insert(['name' => 'NardcoreFlyer', 'file' => 'NardcoreFlyer.jpg', 'title' => 'Nardcore Flyer', 'type' => 'jpg', 'extension' => '.jpg', 'user_id' => 'Demoncowgirl'  ]);

    }

    public function setVisibility(){

        $visibility = Storage::getVisibility('BobBerkman.jpg', 'EvilTracy1.jpg', 'PrettyInPink.jpg', 'TheGrimatWarpedTour2018.jpg', 'TheGrimEarlyDays.jpg', 'TheGrimNuclearWorldOrder.jpg', 'the-grim-cop-killer-7-inch.mp3', 'NardcoreFlyer.jpg');
        Storage::setVisibility('BobBerkman.jpg', 'public');
        Storage::setVisibility('EvilTracy1.jpg', 'public');
        Storage::setVisibility('PrettyInPink.jpg', 'public');
        Storage::setVisibility('TheGrimatWarpedTour2018.jpg', 'public');
        Storage::setVisibility('TheGrimEarlyDays.jpg', 'public');
        Storage::setVisibility('TheGrimNuclearWorldOrder.jpg', 'public');
        Storage::setVisibility('the-grim-cop-killer-7-inch.mp3', 'public');
        Storage::setVisibility('NardcoreFlyer.jpg', 'public');

    }

}
