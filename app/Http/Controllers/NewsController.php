<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;


class NewsController extends Controller
{
    public function index() {

        return view('news.index', [
            'newsList' => News::with(['category', 'source']) //чтобы не было кучи запросов к БД
            ->paginate(config('news.paginate'))
        ]);
    }

    public function show(int $id) {
        return view('news.show', [
            'id' => $id
        ]);
    }

    public function feedback(Request $request)
    {
        $file = fopen('test.txt', 'a+'); // Open .txt file
        $content = json_encode($request->except('_token')) . PHP_EOL; // format data
        fwrite($file , $content);
        fclose($file );
        die(header("Location: ".$_SERVER["HTTP_REFERER"]));

    }


}
