<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class EmpleadoRol extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleado_rol', function (Blueprint $table) {
            $table->unsignedInteger('empleado_id')->comment('Identificador del empleado.');
            $table->foreign('empleado_id', 'fk_empleado_rol_emplado')->references('id')->on('empleados')->onDelete('restrict')->onUpdate('restrict');
            $table->unsignedInteger('rol_id')->comment('Area de la empresa a la que pertenece el empleado. Campo de tipo select. Obligatorio.');
            $table->foreign('rol_id', 'fk_emplado_rol_rol')->references('id')->on('roles')->onDelete('restrict')->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Schema::dropIfExists('empleado_rol');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
