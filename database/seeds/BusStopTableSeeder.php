<?php

use Illuminate\Database\Seeder;

class BusStopTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bus_stop')->delete();
        DB::table('bus_stop')->insert([
            'name' => 'Concord Hotel Bus Station',
            'latitude' => '1.300470',
            'longitude' => '103.841856',
            'description' => 'Bus Stop 1',
        ]);
        DB::table('bus_stop')->insert([
            'name' => 'Bugis station',
            'latitude' => '1.301089',
            'longitude' => '103.855885',
            'description' => 'Bus Stop 2',
        ]);
        DB::table('bus_stop')->insert([
            'name' => 'Opp Bugis Station',
            'latitude' => '1.300155',
            'longitude' => '103.855233',
            'description' => 'Bus Stop 3',
        ]);
        DB::table('bus_stop')->insert([
            'name' => 'Bus Hub Service Pte Ltd',
            'latitude' => '1.305532',
            'longitude' => '103.851492',
            'description' => 'Bus Stop 4',
        ]);
    }
}
