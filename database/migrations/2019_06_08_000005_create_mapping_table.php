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
            $table->integer('users_id');
            $table->integer('mapping_types_id');
            $table->integer('address_id');

            $table->index(["mapping_types_id"], 'fk_mapping_mapping_types1_idx');

            $table->index(["address_id"], 'fk_mapping_address1_idx');

            $table->index(["users_id"], 'fk_mapping_users1_idx');
            $table->timestamps();


            $table->foreign('mapping_types_id', 'fk_mapping_mapping_types1_idx')
                ->references('id')->on('mapping_types')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('address_id', 'fk_mapping_address1_idx')
                ->references('id')->on('address')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('users_id', 'fk_mapping_users1_idx')
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
