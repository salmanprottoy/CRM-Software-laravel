<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class superAdmin extends Model
{
    protected $table = 'supadmin';
    protected $primaryKey = "id";
    public $timestamps = false;
}
