<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['model_id', 'year', 'color', 'price'];

    public function carModel()
    {
        return $this->belongsTo(CarModel::class, 'model_id');
    }
}
