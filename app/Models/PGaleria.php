<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PGaleria extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $table = 'productos_galeria';

    protected $hidden = ['created_at', 'update_at'];


}
