<?php

use Illuminate\Database\Seeder;

class OtherBerwarnaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 1000 ; $i++) { 
            DB::table('other')->insert([ 'id_manga' => $i ]);
        }
    }
}
