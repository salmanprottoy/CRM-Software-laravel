<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marketUser extends Model
{
    protected $table = 'leads';
	protected $primaryKey = "id";
	public $timestamps = false;
	protected $fillable = ['name','email','phone','gender','status','address'];
}
