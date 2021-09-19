<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';

    /*public function getNews()
    {
        return \DB::table($this->table)->get();
       // \DB::table($this->table)
         //   ->join('categories', 'categories.id', '=', 'news.category_id')
          //  ->select("news.*", "categories.title as categoryTitle")->get();


        // \DB::table($this->table)->where('id', '>', 2)->get();
    }*/

    /*public function getNewsById(int $id)
    {
        return \DB::table($this->table)->find($id);
    }*/

    protected $fillable = [
        'category_id', 'title', 'author', 'description', 'source_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function source(): BelongsTo
    {
        return $this->belongsTo(Source::class, 'source_id', 'id');
    }
}
