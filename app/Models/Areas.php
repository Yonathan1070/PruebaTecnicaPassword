<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    use HasFactory;

    protected $table = "areas";
    protected $fillable = [
        'nombre'
    ];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function empleado()
    {
        return $this->belongsTo(Empleados::class);
    }
}
