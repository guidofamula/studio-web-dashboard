<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'title',
    //     'slug',
    //     'thumbnail',
    //     'description',
    //     'category_id',
    // ];

    protected $guarded = ['id'];

    // public function scopeOnlyParent($query)
    // {
    //     return $query->whereNull('category_id');
    // }

    // class model for child category
    // public function parent()
    // {
    //     return $this->belongsTo(self::class);
    // }

    // Clas model for parent category
    // public function category()
    // {
    //     return $this->hasMany(self::class, 'category_id');
    // }

    // public function descendants()
    // {
    //     return $this->children()->with('descendants');
    // }
}
