<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsHasComponentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'projects_has_components';

    /**
     * Run the migrations.
     * @table projects_has_components
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            //$table->increments('id');
            $table->integer('projects_id')->unsigned();
            $table->integer('component_bar_code')->unsigned();
            $table->dateTime('when');

            $table->index("component_bar_code");

            $table->index("projects_id");


            $table->foreign('projects_id')
                ->references('id')->on('projects')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('component_bar_code')
                ->references('bar_code')->on('components')
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
