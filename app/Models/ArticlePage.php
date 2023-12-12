<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlePage extends Model
{
    use HasFactory;
    protected $table = 'article_pages';
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $dates = ['created_at', 'updated_at'];
    protected $fillable = [
           'title', 'description', 'imageShare', 'content','created_at',
   ];
}
