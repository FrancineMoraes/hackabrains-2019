<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'address';

    /**
     * Run the migrations.
     * @table address
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('street', 191);
            $table->string('number', 191)->nullable();
            $table->string('district', 191);
            $table->string('city', 191);
            $table->string('state', 191);
            $table->integer('locale_id')->unsigned();

            $table->timestamps();


            $table->foreign('locale_id')
                ->references('id')->on('locale')
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
