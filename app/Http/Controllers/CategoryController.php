<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function viewTypes() {
        $model = new Category();

        $categories = $model->getCategories();
        return view('news.newsType', [
            'typesList' => $categories
        ]);
    }

}
