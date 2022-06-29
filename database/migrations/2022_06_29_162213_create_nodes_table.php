<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->id('node_id'); // unsigned big integer
            // $table->bigInteger('tree_id')->unsigned();
            $table->bigInteger('nodeable_id')->unsigned();
            // $table->foreignId('tree_id')->constrained('trees')->onDelete('cascade');
            $table->bigInteger('treeable_id')->unsigned();
            $table->string('location', 255);
            $table->enum('gender', ['m', 'f'])->default('m');
            $table->string('photo', 255)->nullable();         // Path to the avatar
            $table->timestamps();
            

            $table->index('treeable_id');
            $table->index('location');
            $table->unique(['treeable_id', 'location']);
            $table->unique(['treeable_id', 'nodeable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nodes');
    }
}
