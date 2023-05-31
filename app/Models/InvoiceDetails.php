<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class InvoiceDetails extends Model
{
    use HasFactory;

    /**
     * table
     *
     * @var string
     */
    protected $table = 'invoice_details';

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'invoice_id',
        'inv_det_code',
        'inv_det_description',
        'inv_det_quantity',
        'inv_det_single_price',
        'inv_det_discount',
        'inv_det_name_additional',
        'inv_det_value_additional',
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
     * invoice
     *
     * @return BelongsTo
     */
    public function invoice() : BelongsTo
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }


}
