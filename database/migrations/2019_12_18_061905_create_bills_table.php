<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('table_no');
            $table->date('date');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('cashier_id');
            $table->unsignedBigInteger('server_id');
            $table->unsignedBigInteger('service_tax_id');
            $table->dateTime('close')->nullable();
            $table->timestamps();

            // Foreign Keys
            $table->foreign('branch_id')
                ->references('id')
                ->on('branches')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('cashier_id')
                ->references('id')
                ->on('cashiers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('server_id')
                ->references('id')
                ->on('servers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('service_tax_id')
                ->references('id')
                ->on('service_taxes')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bills');
    }
}
