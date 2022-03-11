<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('slug');
            $table->text('extract');
            $table->longText('body'); /*un texto largo*/
            /*con enum puedo especificar valores concretos permitidos*/
            $table->enum('status', [1,2])->default(1); /*1 es borrador y 2 es publicado*/

            /*unsigned significa sin signo, es decir, solo números positivos y crece la
            cantidad de valores positivos que puedo guardar (hasta 4000 valores)*/
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('categoria_id');
            /*a continuación se coloca una restricción de llave foránea*/
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('cascade');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
