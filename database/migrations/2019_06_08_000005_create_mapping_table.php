<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMappingTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'mapping';

    /**
     * Run the migrations.
     * @table mapping
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->integer('mapping_types_id')->unsigned();
            $table->integer('address_id')->unsigned();

            $table->timestamps();


            $table->foreign('mapping_types_id')
                ->references('id')->on('mapping_types')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('address_id')
                ->references('id')->on('address')
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
