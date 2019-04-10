<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('model');
            $table->string('specification');
            $table->float('price', 8, 2);;
            $table->bigInteger('stock')->default(0)->nullable();
            $table->string('image_path')->default('NULL');
            $table->tinyInteger('status')->default(0); 
            $table->bigInteger('category_id');
            $table->bigInteger('user_id');
            $table->bigInteger('brand_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('items');
    }
}
