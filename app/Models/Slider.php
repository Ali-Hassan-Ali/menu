<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

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

}//end of model