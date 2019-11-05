<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use softDeletes;
    
    protected $table='cliente';
    
    protected $hidden= ['created_at','updated_at','ip'];
    protected $fillable=['nombre','apellidos','fechanacimiento','correo','telefono','direccion',
            'claveacceso','estadocivil','sueldoanual'];
}
