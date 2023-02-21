<?php

namespace App\Models;

use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasTranslations;

    protected $fillable     = ['name', 'product_id'];
    protected $translatable = ['name'];

}//end of model