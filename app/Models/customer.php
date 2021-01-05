<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
class customer extends Model
{
    use Notifiable;
    use SearchableTrait;

    protected $table = 'customer';
    protected $primaryKey = "id";
    public $timestamps = false;

    protected $searchable=[
        'coloumns'=>[
           'customer.customerName'          =>10,
           'customer.customerContactNumber' =>10,
           'customer.customerAdress'        =>10,
           'customer.customerEmail'         =>10,
           'customer.customerStatus'        =>10,
           'customer.customerGender'        =>10,
           'customer.id'                    =>10
          ]
        ];
        protected $fillable =[
            'customerName','customerContactNumber','customerAdress','customerEmail','customerEmail','customerStatus','customerGender',
        ];
}