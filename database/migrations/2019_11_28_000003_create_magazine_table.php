<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMagazineTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'magazine';

    /**
     * Run the migrations.
     * @table magazine
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->string('localization');
            $table->integer('amount');
            $table->integer('component_bar_code')->unsigned();
            $table->timestamps();
            

           $table->index("component_bar_code");
            $table->foreign('component_bar_code')
                ->references('bar_code')->on('components')
               ->onDelete('cascade')
               ->onUpdate('cascade');
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
