<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Category extends Model
{
    use HasTranslations;

    protected $fillable     = ['name', 'image', 'parent_id', 'status'];
    protected $translatable = ['name'];

    protected $appends  = ['image_path'];

    public function getImagePathAttribute()
    {
        if($this->image) {
            return asset('storage/' . $this->image);
        } else {
            return asset('assets/default.png');
        }
        
    }//end of fun


    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id', 'id');

    }//end of fun


    public function products()
    {
        return $this->hasMany(Product::class,'category_id', 'id');

    }//end of fun

    public function parents()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');

    }//end of fun

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
        
    }//end of fun

}//end of model