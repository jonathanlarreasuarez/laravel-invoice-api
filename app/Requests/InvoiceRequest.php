<?php

namespace App\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InvoiceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules(): array
    {
        return [
            'id_transaction' => 'nullable|integer',
            'inv_business_name' => 'required|string|max:255',
            'inv_business_address' => 'nullable|string|max:255',
            'inv_ruc' => 'required|string|max:255',
            'inv_issue_date' => 'required|date',
            'inv_accounting_required' => 'required|string',
            'inv_number_document' => 'required|string|max:255',
            'inv_establishment' => 'required|string|max:255',
            'inv_emission_point' => 'required|string|max:255',
            'inv_sequential' => 'required|string|max:255',
            'inv_buyer_number_identification' => 'nullable|string|max:255',
            'inv_buyer_address' => 'nullable|string|max:255',
            'inv_buyer_phone' => 'nullable|string|max:255',
            'inv_buyer_email' => 'nullable|string|max:255',
            'inv_total_without_tax' => 'required|numeric',
            'inv_total_discount' => 'required|numeric',
            'inv_total_tax_iva' => 'required|numeric',
            'inv_total_amount' => 'required|numeric',
            'inv_currency' => 'nullable|string|max:255',
        ];
    }
}
