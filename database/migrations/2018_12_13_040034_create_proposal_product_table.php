<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProposalProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposal_product', function (Blueprint $table) {
            $table->integer('proposal_id');
            $table->integer('product_id');
            $table->double('price');
            $table->integer('quantity');
            $table->integer('warranty');
            $table->integer('term');
            $table->string('state');

            $table->primary(['proposal_id' ,'product_id']);
            $table->foreign('proposal_id')->references('id')->on('proposals')->onDelete('cascade');;
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');;

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
        Schema::dropIfExists('proposal_product');
    }
}
