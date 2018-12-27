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
        Schema::create('product_proposal', function (Blueprint $table) {
            $table->unsignedInteger('proposal_id');
            $table->unsignedInteger('product_id');
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
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        Schema::dropIfExists('product_proposal');
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');


    }
}
