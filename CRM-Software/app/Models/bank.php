<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    protected $table = 'bankinfo';
    protected $primaryKey = "id";
    public $timestamps = false;
}
