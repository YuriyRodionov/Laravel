<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Array_;

class CategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert($this->getData());
    }

    private function getData(): array
    {
        $faker = Factory::create();
        $data = [];
        for ($i = 0 ; $i < 10; $i++)
        {
            $data[] = [
                'title' => $faker->sentence(mt_rand(3, 10)),
                'description' => $faker->text(mt_rand(100, 200)),
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        return $data;
    }
}
