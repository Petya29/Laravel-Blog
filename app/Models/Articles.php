<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    public function category() {
        return $this->belongsTo('App\Models\Categories', 'category_id', 'id');
    }

    public function getComments() {
        return $this->hasMany('App\Models\Comments', 'article_id', 'id');
    }
}
