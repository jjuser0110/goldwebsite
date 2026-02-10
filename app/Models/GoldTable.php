<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoldTable extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'type',
        'value',
        'additional_value',
        'new_value',
        'purities',
    ];
}
