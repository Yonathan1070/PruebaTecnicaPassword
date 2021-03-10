<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = "roles";
    protected $fillable = [
        'nombre'
    ];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function empleados()
    {
        return $this->belongsToMany(Empleados::class, 'empleado_rol', 'rol_id', 'empleado_id');
    }
}
