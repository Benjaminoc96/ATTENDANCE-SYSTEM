<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('v_visitors_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('visitors_id');
            $table->string('name');
            $table->string('contact');
            $table->string('address');
            $table->string('department')->nullable(true);
            $table->string('staff')->nullable(true);
            $table->string('purpose');
            $table->string('status')->default('Active');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->string('timeout')->nullable(true);

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
        Schema::dropIfExists('visitors_logs');
    }
};
