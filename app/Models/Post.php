<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    use HasFactory;
    protected $fillable = [
        'title',
        'user_id',
        'tag_id',
        'spot_name',
        'address',
        'latitude',
        'longitude',
        'image_url',
    ];
}
