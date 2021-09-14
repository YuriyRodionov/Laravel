<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class SourceSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('sources')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0 ; $i < 10; $i++)
        {
            $data[] = [
                'title' => $faker->sentence(mt_rand(3, 10)),
                'link' => $faker->internetExplorer(),
                'description' => $faker->text(mt_rand(100, 200)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        return $data;
    }
}
