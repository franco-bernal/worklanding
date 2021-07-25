<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    // protected $appends = ['img_logo'];

    public function getImgLogoAttribute($value)
    {
        $cadena = Str::contains($value, 'http');
        if ($cadena == true) {
            return $value;
        }
        return "images/${value}";
    }
    public function getImgBackAttribute($value)
    {
        $cadena = Str::contains($value, 'http');
        if ($cadena == true) {
            return $value;
        }
        return "${value}";
    }
}
