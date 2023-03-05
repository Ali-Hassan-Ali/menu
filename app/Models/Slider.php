<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Slider extends Model
{
    use HasTranslations;

    protected $fillable     = ['name', 'description', 'image', 'status'];
    protected $translatable = ['name', 'description'];
    protected $appends      = ['image_path'];

    public function getImagePathAttribute()
    {
        return asset('storage/' . $this->image);
        
    }//end of fun

    public function scopeActive(Builder $query): void
    {
        $query->where('status', 1);
        
    }//end of fun

}//end of model