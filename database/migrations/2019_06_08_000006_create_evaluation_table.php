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
            $table->integer('mapping_id');
            $table->integer('users_id');

            $table->index(["mapping_id"], 'fk_evaluation_mapping1_idx');

            $table->index(["users_id"], 'fk_evaluation_users1_idx');
            $table->timestamps();


            $table->foreign('mapping_id', 'fk_evaluation_mapping1_idx')
                ->references('id')->on('mapping')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_evaluation_users1_idx')
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
