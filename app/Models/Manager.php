<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manager extends Model
{
    protected $table = 'user';
    protected $primaryKey = "id";
    public $timestamps = false;
}
