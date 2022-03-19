<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'category_id',
        'nationality',
        'count',
        'cost',
        'description'
    ];


    public function category() {
        return $this->belongsTo(Category::class);
    }

    public function media()
    {
        return $this->hasOne(ProductMedia::class);
    }
}
