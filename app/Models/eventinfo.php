<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class eventinfo extends Model
{
    protected $table = 'eventinfo';
    protected $primaryKey = "id";
    public $timestamps = false;
}