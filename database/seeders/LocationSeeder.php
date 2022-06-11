<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('locations')->insert([
           [
               'title'=>'Wilmington (North Carolina)',
               'all_blocks'=> '100',
               'remainder_blocks'=> '50',
               'blockPricePerDay'=> '50',
               'timezone'=> 'Etc/GMT-4'
           ] ,
           [
               'title'=>'Portland (Oregon)',
               'all_blocks'=> '100',
               'remainder_blocks'=> '40',
               'blockPricePerDay'=> '50',
               'timezone'=> 'Etc/GMT-8'
           ],
           [
               'title'=>'Toronto',
               'all_blocks'=> '100',
               'remainder_blocks'=> '80',
               'blockPricePerDay'=> '50',
               'timezone'=> 'America/Toronto'
           ],
           [
               'title'=>'Warsaw',
               'all_blocks'=> '100',
               'remainder_blocks'=> '85',
               'blockPricePerDay'=> '50',
               'timezone'=> 'Etc/GMT+2'
           ],
           [
               'title'=>'Valencia',
               'all_blocks'=> '100',
               'remainder_blocks'=> '60',
               'blockPricePerDay'=> '50',
               'timezone'=> 'Etc/GMT+2'
           ],
           [
               'title'=>'Shanghai',
               'all_blocks'=> '100',
               'remainder_blocks'=> '30',
               'blockPricePerDay'=> '50',
               'timezone'=> 'Etc/GMT+8'
           ]
        ]);
    }
}
