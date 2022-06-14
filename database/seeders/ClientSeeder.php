<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'name'=>'vasia',
                'email'=> 'vasia@gmail.com',
                'password'=> '12345'
            ] ,
            [
                'name'=>'petia',
                'email'=> 'petia@gmail.com',
                'password'=> '54321'
            ] ,
            [
                'name'=>'kolia',
                'email'=> 'kolia@gmail.com',
                'password'=> '123456789'
            ] ,
        ]);
    }

}
