<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class marketCustomer extends Model
{
    protected $table = 'customer';
	protected $primaryKey = "id";
	public $timestamps = false;
	protected $fillable = ['customerName','customerEmail','customerContactNumber','customerGender','customerStatus','customerAdress'];
}
