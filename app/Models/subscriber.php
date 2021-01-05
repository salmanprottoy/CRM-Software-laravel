<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subscriber extends Model
{
    protected $table = 'subscriber';
    protected $primaryKey = "id";
    public $timestamps = false;
}
