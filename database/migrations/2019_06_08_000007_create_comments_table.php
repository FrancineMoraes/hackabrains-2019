<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'comments';

    /**
     * Run the migrations.
     * @table comments
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->longText('description');
            $table->integer('users_id');
            $table->integer('mapping_id');

            $table->index(["mapping_id"], 'fk_comments_mapping1_idx');

            $table->index(["users_id"], 'fk_comments_users1_idx');
            $table->timestamps();


            $table->foreign('users_id', 'fk_comments_users1_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('mapping_id', 'fk_comments_mapping1_idx')
                ->references('id')->on('mapping')
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
