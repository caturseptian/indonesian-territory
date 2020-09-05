<?php

use App\Village;
use Illuminate\Database\Seeder;

class VillageSeeder18 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $villages = array();

        if (is_array($villages) && count($villages)) {
            Village::query()->insert($villages);
        }
    }
}
