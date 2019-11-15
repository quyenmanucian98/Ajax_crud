<?php

use Illuminate\Database\Seeder;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customer = new \App\Customer();
        $customer->name = 'quyen';
        $customer->age = 21;
        $customer->save();

        $customer = new \App\Customer();
        $customer->name = 'quyen';
        $customer->age = 21;
        $customer->save();

        $customer = new \App\Customer();
        $customer->name = 'quyen';
        $customer->age = 21;
        $customer->save();

        $customer = new \App\Customer();
        $customer->name = 'quyen';
        $customer->age = 21;
        $customer->save();

        $customer = new \App\Customer();
        $customer->name = 'quyen';
        $customer->age = 21;
        $customer->save();

        $customer = new \App\Customer();
        $customer->name = 'quyen';
        $customer->age = 21;
        $customer->save();
    }
}
