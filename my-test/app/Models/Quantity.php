<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quantity extends Model
{
    use HasFactory;

    protected $table = 'inwd_otwd_quantity';


    protected $fillable = ['category_id','material_id','date','inwd_outwd_qty'];
}
