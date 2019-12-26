<?php

namespace App;

use App\Image;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
