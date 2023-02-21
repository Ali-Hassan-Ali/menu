<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasTranslations;

    protected $fillable     = ['name', 'image', 'status'];
    protected $translatable = ['name'];

    protected $appends  = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
        
    }//end of fun


    public function category()
    {
        return $this->belongsTo(Category::class , 'category_id', 'id');

    }//end of fun


    public function products()
    {
        return $this->hasMany(Product::class,'category_id', 'id');

    }//end of fun

}//end of model