<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function viewTypes() {
        return view('news.newsType', [
            'typesList' => $this->saveData()
        ]);
    }

    public function types($type) {
        return view('news.types', [
            'brand' => $type
        ]);
    }
}
