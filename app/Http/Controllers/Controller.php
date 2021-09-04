<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function getNews(): array {
        $faker = Factory::create('ru_RU');
        $countNumber = mt_rand(10, 15);
        $data = [];
        for($i=0; $i<$countNumber; $i++) {
            $data[] = [
                'id' => $i+1,
                'title' => $faker->jobTitle(),
                'title_id' => $faker->numberBetween(1, 4),
                'description' => $faker->sentence(3),
                'author' => $faker->name(),
                'created_at' => now()
            ];
        }
        return $data;
    }

    protected function saveData(): array {
        $news = $this->getNews();
        $types = [];
        foreach ($news as $type) {
            if(!isset($types[$type['title_id']])) {
                $types[$type['title_id']] = [$type['title']];
            } else {
                array_push($types[$type['title_id']], $type['title']);
            }

        }
        return $types;
    }
}
