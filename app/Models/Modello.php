<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modello extends Model
{
    protected $table = 'modelli';
    protected $guarded = [];

    use SoftDeletes;
}
