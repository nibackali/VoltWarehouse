<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'orders';

    /**
     * Run the migrations.
     * @table orders
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('amount');
            $table->dateTime('order_date');
            $table->dateTime('arrival_date')->nullable();
            $table->integer('component_bar_code')->unsigned();
            $table->integer('shop_id')->unsigned();

            $table->index(["shop_id"]);

            $table->index(["component_bar_code"]);



            $table->foreign('component_bar_code')
                ->references('bar_code')->on('components')
                ->onDelete('no action')
                ->onUpdate('no action');
// 'fk_orders_shops1_idx'
            $table->foreign('shop_id')
                ->references('id')->on('shops')
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
