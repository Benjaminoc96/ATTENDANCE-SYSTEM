<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purposes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('visitors_id');
            $table->string('department');
            $table->string('staff');
            $table->string('purpose');
            $table->string('status')->default('Active');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('visitors_id')->references('id')->on('visitors')->onDelete('restrict')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('purposes');
    }
};
