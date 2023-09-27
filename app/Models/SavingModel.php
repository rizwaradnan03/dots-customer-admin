<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavingModel extends Model
{
    protected $table = 'tabmaster';
    protected $fillable = [
        'kodeljk','cif','norekening'
    ];
    use HasFactory;
}
