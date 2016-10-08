<?php

use Illuminate\Database\Seeder;

class OrderStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('order_status')->insert([
            ['name' => 'Заказ принят'],
            ['name' => 'Заказ передан на исполнение'],
            ['name' => 'Заказ доставляется'],
            ['name' => 'Заказ подготовлен к выдаче'],
            ['name' => 'Заказ выдан']
        ]);
    }
}
