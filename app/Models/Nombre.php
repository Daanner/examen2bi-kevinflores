<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Nombre
 *
 * @property $id
 * @property $tipo
 * @property $numero
 * @property $precio
 * @property $fotografia
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Nombre extends Model
{
    

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo', 'numero', 'precio', 'fotografia'];
   


}
