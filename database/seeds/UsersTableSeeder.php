<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(App\Products::class, 10)->create();

        factory(App\Purchaseorder::class, 10)->create();
    }
}
