<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Color;

class ColorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create(['description' => 'blue']);
        Color::create(['description' => 'yellow']);
        Color::create(['description' => 'green']);
        Color::create(['description' => 'red']);
        Color::create(['description' => 'white']);
        Color::create(['description' => 'black']);
        Color::create(['description' => 'grey']);
        Color::create(['description' => 'brown']);
    }
}
