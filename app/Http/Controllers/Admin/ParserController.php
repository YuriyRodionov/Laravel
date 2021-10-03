<?php

namespace App\Http\Controllers\Admin;

use App\Contract\Parser;
use App\Http\Controllers\Controller;
use App\Jobs\NewsJob;
use App\Models\News;
use App\Models\Source;
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

        $urls = [
            'https://news.yandex.ru/auto.rss',
            'https://news.yandex.ru/auto_racing.rss',
            'https://news.yandex.ru/army.rss',
            'https://news.yandex.ru/gadgets.rss',
            'https://news.yandex.ru/index.rss',
        ];

        foreach ($urls as $url) {

            dispatch(new NewsJob($url));

        }

        return redirect()->route('admin.news.index')->with('success', 'Новости добавлены в очередь');

    }
}
