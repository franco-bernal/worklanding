<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyects extends Model
{
    use HasFactory;

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function getLimitAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i');
    }

    public function tasks()
    {
        return $this->hasMany(Tasks::class, 'proyect_id');
    }
}
