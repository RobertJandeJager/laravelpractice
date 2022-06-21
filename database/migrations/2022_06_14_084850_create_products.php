<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->decimal('vat')->default(21);
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('created_by')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->foreign('updated_by')->references('id')->on('users');
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users');
        });
    

    Schema::create('product_categories', function (Blueprint $table) {
        $table->id();
        $table->string('name');

        $table->timestamps();
        $table->softDeletes();

        $table->unsignedBigInteger('created_by')->nullable();
        $table->foreign('created_by')->references('id')->on('users');
        $table->unsignedBigInteger('updated_by')->nullable();
        $table->foreign('updated_by')->references('id')->on('users');
        $table->unsignedBigInteger('deleted_by')->nullable();
        $table->foreign('deleted_by')->references('id')->on('users');
    });

    Schema::create('product_has_categories', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('product_id');
        $table->foreign('product_id')->references('id')->on('products');
        $table->unsignedBigInteger('category_id');
        $table->foreign('category_id')->references('id')->on('product_categories');
    });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};