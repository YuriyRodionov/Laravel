<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Parser;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class ParserController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Parser $service)
    {
        //$service = new ParserService();
        //dd($service->parse('https://news.yandex.ru/music.rss'));

        $newsList = $service->parse('https://news.yandex.ru/music.rss');

            foreach ($newsList['news'] as $oneNews) {
                News::create([
                    'category_id' => 1,
                    'title' => $oneNews['title'],
                    'description' => $oneNews['description'],
                    'author' => 'Yandex',
                    'created_at' => $oneNews['pubDate'],
                    'source_id' => 1

                ]);
            }

        return redirect()->route('admin.news.index');

    }
}
