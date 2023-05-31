<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('invoice', static function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_transaction')->nullable();

            $table->string('inv_business_name');
            $table->string('inv_business_address');
            $table->string('inv_ruc');
            $table->date('inv_issue_date');
            $table->enum('inv_accounting_required', ['SI', 'NO'])->nullable();

            $table->string('inv_number_document');
            $table->string('inv_establishment');
            $table->string('inv_emission_point');
            $table->string('inv_sequential');

            $table->string('inv_buyer_number_identification')->nullable();
            $table->string('inv_buyer_address')->nullable();
            $table->string('inv_buyer_phone')->nullable();
            $table->string('inv_buyer_email')->nullable();

            $table->decimal('inv_total_without_tax', 11, 4)->default(0);
            $table->decimal('inv_total_discount', 11, 4)->default(0);
            $table->decimal('inv_total_tax_iva', 11, 4)->default(0);
            $table->decimal('inv_total_amount', 11, 4)->default(0);
            $table->string('inv_currency')->nullable();

            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
}
