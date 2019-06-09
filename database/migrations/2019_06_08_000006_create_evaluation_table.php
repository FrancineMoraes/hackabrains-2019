<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEvaluationTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'evaluation';

    /**
     * Run the migrations.
     * @table evaluation
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->enum('evaluation', ['like', 'dislike']);
            $table->integer('mapping_id')->unsigned();
            $table->integer('users_id')->unsigned();

            $table->timestamps();


            $table->foreign('mapping_id')
                ->references('id')->on('mapping')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->tableName);
     }
}
