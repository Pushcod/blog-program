<?php

namespace App\Models;

use COM;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'small_text',
        'content',
        'image',
        'is_active',
        'category_id',
        'tag_id',
        'is_popular',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];


    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
