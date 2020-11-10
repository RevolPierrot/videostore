<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->down();
        Schema::create('movies', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedInteger('author_id');
            $table
                ->foreign('author_id')
                ->references('id')
                ->on('authors')
                ->onDelete('cascade')
                ->onUpdate('cascade')
            ;
            $table->string('title', 100);
            $table->unsignedDecimal('price');
            $table->timestamps();
            $table->index(['title','price']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
