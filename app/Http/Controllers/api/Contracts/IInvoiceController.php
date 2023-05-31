<?php

namespace App\Http\Controllers\api\Contracts;

use App\Models\Invoice;
use App\Requests\InvoiceRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

interface IInvoiceController
{

    /**
     * @OA\Get(
     *   path="/api/v1/invoices",
     *   tags={"Invoice"},
     *   summary="Get all invoices",
     *   description="Get all invoices in format JSON",
     *   operationId="getAllInvoices",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=404, description="Not found"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     */
    public function index(Request $request): JsonResponse;

    /**
     * @OA\Get(
     *   path="/api/v1/invoices/{invoice}",
     *   tags={"Invoice"},
     *   summary="Get invoice by Id",
     *   description="Get invoice by Id in format JSON",
     *   operationId="getInvoicesById",
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=404, description="Not found"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     */
    public function show(int $id): JsonResponse;

    /**
     * @OA\Post(
     *   path="/api/v1/invoices",
     *   tags={"Invoice"},
     *   summary="Create new invoice.",
     *   description="Create new invoice.",
     *   operationId="addInvoice",
     *   @OA\RequestBody(
     *     required=true,
     *     @OA\MediaType(
     *       mediaType="multipart/form-data",
     *       @OA\Schema(
     *         @OA\Property(
     *           property="id_transaction",
     *           description="id transaction",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="inv_business_name",
     *           description="business name",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="inv_business_address",
     *           description="business address",
     *           type="string",
     *         ),
     *         @OA\Property(
     *           property="inv_ruc",
     *           description="ruc",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_issue_date",
     *           description="issue date",
     *           type="date",
     *         ),
     *          @OA\Property(
     *           property="inv_accounting_required",
     *           description="accounting required",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_number_document",
     *           description="number document",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_establishment",
     *           description="number establishment",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_emission_point",
     *           description="number emission point",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_sequential",
     *           description="number sequential",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_buyer_number_identification",
     *           description="buyer number identification",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_buyer_address",
     *           description="buyer address",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_buyer_phone",
     *           description="buyer_phone",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_buyer_email",
     *           description="buyer email",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_total_without_tax",
     *           description="total without tax",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_total_discount",
     *           description="inv total discount",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_total_tax_iva",
     *           description="total tax iva",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_total_amount",
     *           description="total_amount",
     *           type="string",
     *         ),
     *          @OA\Property(
     *           property="inv_currency",
     *           description="currency ",
     *           type="string",
     *         ),
     *       ),
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=404, description="Not found"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     */
    public function store(InvoiceRequest $request): JsonResponse;

    public function update(InvoiceRequest $request, Invoice $invoice): JsonResponse;

    /**
     * @OA\Delete(
     *   path="/api/v1/invoices/{invoice}",
     *   tags={"Invoice"},
     *   summary="Delete invoice",
     *   description="Delete invoice by Id",
     *   operationId="deleteInvoicesById",
     *   @OA\Parameter(
     *     name="invoice",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="integer",
     *       example="1"
     *     ),
     *   ),
     *   @OA\Response(response=200, description="Success"),
     *   @OA\Response(response=404, description="Not found"),
     *   @OA\Response(response=500, description="Error interno del servidor")
     * )
     */
    public function destroy(Invoice $invoice): JsonResponse;
}
