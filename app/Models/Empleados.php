<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;

    protected $table = "empleados";
    protected $fillable = [
        'nombre',
        'email',
        'sexo',
        'area_id',
        'boletin',
        'descripcion'
    ];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'empleado_rol', 'empleado_id', 'rol_id');
    }

    public function area()
    {
        return $this->hasOne(Areas::class, 'id', 'area_id');
    }
}
