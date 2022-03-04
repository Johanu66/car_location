<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
            'admin' => true,
        ]);

        $marks = ['FERRARI','FIAT', 'AUDI','BENTLEY','NISSAN', 'HONDA'];
        $images = ['car1.jpg','car2.jpg', 'car3.jpg','car4.jpg','car5.jpg', 'car6.jpg'];

        for($i=0; $i<6 ; $i++){
            DB::table('cars')->insert([
                'mark' =>$marks[$i],
                'description' => "This car is a category of car body. It is a medium-sized car, usually between 4 and 5 meters long, with a fixed hardtop roof (unlike a coupé-cabriolet), four doors, four windows and at least four seats on board.",
                'image_name'=>$images[$i],
                'image_path'=>"images/".$images[$i],
                'price_per_day' => 100+($i*10),
                'plate_number' => "AC148596"
            ]);
        }
    }
}
