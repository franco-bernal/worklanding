<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Tecnologies extends Model
{
    use HasFactory;


    public function getImgLogoAttribute($value)
    {
        $cadena = Str::contains($value, 'http');
        if ($cadena == true) {
            return $value;
        }
        return "images/${value}";
    }
}
