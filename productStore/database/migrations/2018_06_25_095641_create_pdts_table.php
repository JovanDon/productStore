<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('qty');
            $table->integer('cprice');
            $table->integer('sprice');
            $table->integer('amount_instock')->nullable();
            $table->date('expdate');
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
        Schema::dropIfExists('pdts');
    }
}
