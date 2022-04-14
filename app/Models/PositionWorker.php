<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PositionWorker extends Model
{
    use HasFactory;

    protected $fillable = ['position_id','worker_id'];
}
