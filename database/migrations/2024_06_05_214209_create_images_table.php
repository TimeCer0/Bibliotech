<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
        // database/migrations/xxxx_xx_xx_create_images_table.php
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('path'); // Para almacenar la ruta de la imagen
            $table->timestamps();
        });
    }
    
};
