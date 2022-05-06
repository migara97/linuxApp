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
        Schema::create('freeissues', function (Blueprint $table) {
            $table->id();
            $table->string('free_issue_lable');
            $table->string('type');
            $table->integer('product_ID');
            $table->integer('purchase_qty');
            $table->integer('free_qty');
            $table->integer('lower_limit');
            $table->integer('upeer_limit');            
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
        Schema::dropIfExists('freeissues');
    }
};
