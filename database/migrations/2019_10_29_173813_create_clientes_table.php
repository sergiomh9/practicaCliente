<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nombre',50);
            $table->string('apellidos',100);
            $table->date('fechanacimiento');
            $table->string('correo');
            $table->integer('telefono')->nullable();
            $table->string('direccion',100) ->nullable();
            $table->string('claveacceso',50);
            $table->string('estadocivil',30) ->nullable();
            $table->decimal('sueldoanual',8,2) ->nullable();
            $table->ipAddress('ip')->nullable();
            
            $table->timestamps();
            $table->softDeletes();
            
            $table-> unique(['correo']);
            $table-> unique(['nombre','apellidos','fechanacimiento']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cliente');
    }
}
