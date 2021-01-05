<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adminUser extends Model
{
    protected $table = 'adminuser';
    protected $primaryKey = "id";
    public $timestamps = false;
}
