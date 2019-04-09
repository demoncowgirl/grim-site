<?php

use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('items')->insert(['itemName' => 'Black & White Patch', 'price' => '5.00', 'description' => 'A ?-inch, black-and-white band logo path.', 'size' => '', 'quantity' => 25, 'image' => 'b&w_patch.jpg', 'user_id' =>'Demoncowgirl']);
      DB::table('items')->insert(['itemName' => 'The Grim - Best of Album', 'price' => '20.00', 'description' => 'This is the Best of LP.', 'size' => '', 'quantity' => 10, 'image' => 'best_of_album.jpg', 'user_id' =>'Demoncowgirl']);
      DB::table('items')->insert(['itemName' => 'Cop Killer EP', 'price' => '10.00', 'description' =>'This is a ?-song vinyl EP.' , 'size' => '', 'quantity' => 50, 'image' => 'cop_killer_ep.jpg', 'user_id' =>'Demoncowgirl']);
      DB::table('items')->insert(['itemName' => 'Face of Betrayal LP', 'price' => '20.00', 'description' => 'This is a full length vinyl LP.' , 'size' => '', 'quantity' => 15, 'image' => 'face_of_betrayal.jpg', 'user_id' =>'Demoncowgirl']);
      DB::table('items')->insert(['itemName' => 'Cop Killer Set', 'price' => '75.00', 'description' => 'This set includes the Cop Killer EP, a poster and t-shirt' , 'size' => 'M', 'quantity' => 10, 'image' => 'grim_cop_killer.jpg', 'user_id' =>'Demoncowgirl']);
      DB::table('items')->insert(['itemName' => 'Cop Killer Set', 'price' => '75.00', 'description' => 'This set includes the Cop Killer EP, a poster and t-shirt' , 'size' => 'L', 'quantity' => 10, 'image' => 'grim_cop_killer.jpg', 'user_id' =>'Demoncowgirl']);
      DB::table('items')->insert(['itemName' => 'Cop Killer Set', 'price' => '75.00', 'description' => 'This set includes the Cop Killer EP, a poster and t-shirt' , 'size' => 'XL', 'quantity' => 10, 'image' => 'grim_cop_killer.jpg', 'user_id' =>'Demoncowgirl']);
      DB::table('items')->insert(['itemName' => 'The Grim Logo Badge - Blue', 'price' => '0.50', 'description' => 'This is a ?-inch metal badge.' , 'size' => '', 'quantity' => 100, 'image' => 'pins_blue_white.jpg', 'user_id' =>'Demoncowgirl']);
    }
}