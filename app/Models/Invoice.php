<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{

    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'invoice';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'id_transaction',
        'inv_business_name',
        'inv_business_address',
        'inv_ruc',
        'inv_issue_date',
        'inv_accounting_required',
        'inv_number_document',
        'inv_establishment',
        'inv_emission_point',
        'inv_sequential',
        'inv_buyer_number_identification',
        'inv_buyer_address',
        'inv_buyer_phone',
        'inv_buyer_email',
        'inv_total_without_tax',
        'inv_total_discount',
        'inv_total_tax_iva',
        'inv_total_amount',
        'inv_currency'
    ];

    /**
     * hidden
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    /**
     * InvoiceDetails
     *
     * @return HasMany
     */
    public function invoiceDetails() : HasMany
    {
        return $this->hasMany(InvoiceDetails::class, 'invoice_id');
    }
}
