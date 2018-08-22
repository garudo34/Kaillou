<?php

use Illuminate\Database\Seeder;

class AnimesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Anime::class, 2)
            ->create()
            ->each(function ($anime) {
                $anime->composers()->attach(factory(App\Composer::class, 2)
                    ->create()
                    ->each(function ($composer) use ($anime) {
                        $composer->songs()->save(factory(App\Song::class)
                            ->create(['anime_id' => $anime->id, 'composer_id' => $composer->id]));
                    })
                );
            });
    }
}
