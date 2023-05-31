<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('invoice_details', static function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('invoice_id')->unsigned();
            $table->foreign('invoice_id')->references('id')->on('invoice');

            $table->string('inv_det_code');

            $table->string('inv_det_description');

            $table->decimal('inv_det_quantity', 11, 4)->default(0);
            $table->decimal('inv_det_single_price', 11, 4)->default(0);
            $table->decimal('inv_det_discount', 11, 4)->default(0);

            $table->string('inv_det_name_additional')->nullable();
            $table->string('inv_det_value_additional')->nullable();

            $table->timestamps();
            $table->softDeletes('deleted_at' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_details');
    }
}
