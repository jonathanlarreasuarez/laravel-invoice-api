<?php

namespace App\Repositories;

use App\Models\Invoice;
use Illuminate\Database\Eloquent\Collection;

class InvoiceRepository extends BaseRepository
{
    /**
     * relations
     *
     * @var array
     */
    protected $relations = [
        'invoiceDetails'
    ];

    protected $fields = ['inv_business_name', 'inv_buyer_number_identification'];


    /**
     * __construct
     *
     * @return void
     */
    public function __construct(Invoice $invoice)
    {
        parent::__construct($invoice);
    }

    /**
     * @param $request
     * @return Collection
     */
    public function all($request): Collection
    {
        $idTransaction = $request->id_transaction ?? null;
        $dateIssue = $request->inv_issue_date ?? null;
        $idEmissionPoint = $request->inv_emission_point ?? null;
        $fieldSearch = $request->search ?? null;

        return $this->model->with($this->relations)
            ->when($idTransaction, function ($query, $idTransaction) {
                return $query->where('id_transaction', $idTransaction);
            })
            ->when($idEmissionPoint, function ($query, $idEmissionPoint) {
                return $query->where('inv_emission_point', $idEmissionPoint);
            })
            ->when($dateIssue, function ($query, $dateIssue) {
                return $query->where('inv_issue_date', '<=', $dateIssue);
            })
            ->when($fieldSearch, function ($query, $fieldSearch) {
                $fields = $this->fields;
                foreach ($fields as $i => $iValue) {
                    $query->orwhere($iValue, 'like', '%' . $fieldSearch . '%');
                }
            })
            ->get();
    }

}
