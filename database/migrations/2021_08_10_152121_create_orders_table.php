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
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('discount')->default(0);
            $table->integer('subtotal');
            $table->integer('tax')->default(0);
            $table->integer('total');
            $table->string('name');
            $table->string('mobile');
            $table->string('email');
            $table->text('address');
            $table->string('city');
            $table->string('village');
            $table->string('country');
            $table->text('note')->nullable();
            $table->string('zipcode');
            $table->enum('status', ['ordered', 'delivered', 'cancled'])->default('ordered');
            $table->boolean('is_shipping_different')->default(false);
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
