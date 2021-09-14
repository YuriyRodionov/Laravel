<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    public function getNews()
    {
        return \DB::table($this->table)->get();
       /* \DB::table($this->table)
            ->join('categories', 'categories.id', '=', 'news.category_id')
            ->select("news.*", "categories.title as categoryTitle")->get();
       */

        // \DB::table($this->table)->where('id', '>', 2)->get();
    }

    public function getNewsById(int $id)
    {
        return \DB::table($this->table)->find($id);
    }
}
