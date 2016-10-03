<?php

use Illuminate\Database\Seeder;
use App\Header;

class HeaderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $header = new Header();
        $header->phone1 = '89500000000';
        $header->phone2 = '89500000000';
        $header->address = 'г.Новочеркасск';
        $header->save();
    }
}
