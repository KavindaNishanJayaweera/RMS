<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainStops extends Model
{
    use HasFactory;

    protected $table = 'train_stops';
    protected $primaryKey = 'id';
}
