<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigInteger('customer_id');
            $table->string('name', 50);
            $table->string('email', 30);
            $table->string('phone', 15);
            $table->timestamps();
            $table->primary('customer_id');
        });

        Schema::create('employees', function(Blueprint $table){
            $table->bigInteger('employee_id');
            $table->string('name', 50);
            $table->date('start_date');
            $table->timestamps();
            $table->primary('employee_id');
        });

        Schema::create('products', function(Blueprint $table){
            $table->bigInteger('product_id');
            $table->string('name', 50);
            $table->decimal('price', 10, 2);
            $table->timestamps();
            $table->primary('product_id');
        });

        Schema::create('orders', function(Blueprint $table){
            $table->bigInteger('order_id');
            $table->bigInteger('employee_id')->nullable(false);
            $table->bigInteger('customer_id')->nullable(false);
            $table->dateTime('order_days');
            $table->string('order_address', 50);
            $table->timestamps();
            $table->primary('order_id');
            $table->foreign('employee_id')->references('employee_id')->on('employees')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::create('order_detail', function(Blueprint $table){
            $table->bigInteger('order_id')->nullable(false);
            $table->bigInteger('product_id')->nullable(false);
            $table->string('name', 30);
            $table->decimal('price', 10, 2);
            $table->decimal('discount', 10, 2);
            $table->timestamps();
            $table->primary(['order_id', 'product_id']);
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('product_id')->references('product_id')->on('products')->onDelete('cascade')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_detail');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('products');
        Schema::dropIfExists('employees');
        Schema::dropIfExists('customers');
    }
};
