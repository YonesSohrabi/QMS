<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->foreignId('quiz_id')->constrained()
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
            $table->boolean('user_designer')->default(0);
            $table->text('answer')->nullable();
            $table->tinyText('score')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('quiz_user');
    }
}
