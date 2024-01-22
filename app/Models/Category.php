<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Arr;

class Category extends Model
{
    use HasFactory;
    protected  static $relationships = ['videos'];

    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }

    public function scopeSearch($query, ?string $name){
        return $query->where('name', 'like', "%$name%");
    }

}
