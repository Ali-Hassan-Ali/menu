<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use HasTranslations;

    protected $fillable     = ['name', 'image',' myp', 'status', 'description', 'category_id'];
    protected $translatable = ['name', 'description'];

    protected $appends = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
        
    }//end of fun

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id' , 'id');

    }//end of fun

    public function items()
    {
        return $this->hasMany(ProductItem::class, 'product_id' , 'id');

    }//end of fun

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
        
    }//end of fun

}//end of model