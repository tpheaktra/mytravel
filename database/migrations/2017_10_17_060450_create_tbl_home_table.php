<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblHomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_home', function (Blueprint $table) {
            $table->increments('id');
			$table->integer('user_id');
			$table->string('logo',300);
			$table->string('favaion',300);
			$table->text('description',300);
			$table->string('phone',250);
			$table->string('email',250);
			$table->string('working',250);
			$table->text('address',300);
			$table->text('welcome',500);
			$table->text('information',600);
			$table->text('we_are',600);
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
        Schema::dropIfExists('tbl_home');
    }
}
