<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Ejecuta las migraciones.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id(); // Genera una columna de tipo bigint auto incremental para el id
            $table->string('name'); // Columna para el nombre del contacto
            $table->string('email')->unique(); // Columna para el correo electrónico, con restricción única
            $table->string('phone'); // Columna para el teléfono
            $table->timestamps(); // Genera las columnas created_at y updated_at
        });
    }

    /**
     * Revertir las migraciones.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contacts'); // Elimina la tabla si ya existe
    }
}
