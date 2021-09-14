<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index() {
        $model = new News();
        $newsList = $model->getNews();
        return view('news.index', [
            'newsList' => $newsList
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
