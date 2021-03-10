<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class Empleados extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->increments('id')->comment('Identificador del empleado');
            $table->string('nombre', 255)->comment('Nombre completo del empleado. Campo tipo text. Solo debe permitir letras con o sin tilde y espacios. No se admiten caracteres especiales ni números. Obligatorio.');
            $table->string('email', 255)->comment('Correo electrónico del empleado. Campo de tipo Text|Email. Solo permite una estructura de correo. Obligatorio.');
            $table->char('sexo')->comment('Campo de tipo Radio Button. M para Masculino. F para Femenino. Obligatorio.');
            $table->unsignedInteger('area_id')->comment('Area de la empresa a la que pertenece el empleado. Campo de tipo select. Obligatorio.');
            $table->foreign('area_id', 'fk_area_empleado')->references('id')->on('areas')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('boletin')->comment('1 para Recibir boletín. 0 para no Recibir boletín. Campo de tipo Checkbox. Obligatorio.');
            $table->text('descripcion')->comment('Se describe la experiencia del empleado. Campo de tipo textarea. Obligatorio.');
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_spanish_ci';
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
        Schema::dropIfExists('empleados');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}
