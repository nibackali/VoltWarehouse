<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComponentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'components';

    /**
     * Run the migrations.
     * @table components
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->integer('bar_code')->unsigned()->primary();
            $table->string('producer', 45);
            $table->string('producer_code', 128);
            $table->string('name', 128);
            $table->text('description');
            $table->string('setup', 45);
            $table->string('cover', 45);
            $table->string('package', 45);
            $table->string('producer_index_card');
            $table->string('type_name', 45);
            $table->text('type_data');
            $table->text('categories');
            $table->dateTime('last_order_date');
            $table->dateTime('last_arrival_date');
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
       Schema::dropIfExists($this->tableName);
     }
}
