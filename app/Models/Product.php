<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $dates = ['delete_at'];

    protected $table = 'productos';

    protected $hidden = ['created_at', 'update_at'];

    public function cat()
    {
        return $this->hasOne(Categoria::class, 'id', 'categoria_id');
    }

    public function getGaleria()
    {
        return $this->hasMany(PGaleria::class, 'producto_id', 'id');
    }
}
