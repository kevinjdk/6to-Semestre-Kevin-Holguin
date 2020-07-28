<?php

use Illuminate\Database\Seeder;

class Offer_professionalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Offer_professional::class, 100)->create();
    }
}
