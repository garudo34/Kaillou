<?php

use Illuminate\Database\Seeder;

class ComposersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Composer::class, 10)->create();
    }
}
