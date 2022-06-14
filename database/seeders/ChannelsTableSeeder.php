<?php

namespace Database\Seeders;

use App\Models\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([

            'name' => 'Laravel 8.7',
            'slug' => 'Laravel8.7'
        ]);

        Channel::create([

            'name' => 'VueJs 3',
            'slug' => 'VueJs3'
        ]);

        Channel::create([

            'name' => 'Angular 7',
            'slug' => 'Angular7'
        ]);

        Channel::create([

            'name' => 'NodeJs',
            'slug' => 'NodeJs'
        ]);


    }
}
