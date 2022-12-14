<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'thumbnail',
        'description',
        'parent_id',
    ];

    public function scopeOnlyParent($query)
    {
        return $query->whereNull('parent_id');
    }

    // class model for child category
    public function parent()
    {
        return $this->belongsTo(self::class);
    }

    // Clas model for parent category
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function descendants()
    {
        return $this->children()->with('descendants');
    }
}
