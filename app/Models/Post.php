<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'image',
    ];

    public function users()
  {
    return $this->hasMany('App\Models\User');
  }

  public function categories()
  {
    return $this->hasMany(Category::class, 'category_id', 'id');
  }
}
