<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    public function getArticles() {
        return $this->hasMany('App\Models\Articles', 'category_id', 'id');
    }
}
