<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->string("base")->nullable();//eng veng ge an ni
            $table->string("name");
            $table->string("address");
            $table->string("contact",20);
            $table->string("items");//no special character from the user 
            $table->string("param1")->nullable();            
            $table->string("param2")->nullable();
            $table->string("param3")->nullable();

            $table->integer("status")->nullable();//1=processing. 2=delivering. 3=delivered

            $table->softDeletes();
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
        Schema::dropIfExists('orders');
    }
}
