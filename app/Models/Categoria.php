<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $table = 'categorias';

    protected $hidden = ['created_at', 'update_at'];
}
