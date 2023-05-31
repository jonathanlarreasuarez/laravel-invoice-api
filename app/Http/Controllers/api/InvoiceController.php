<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\api\Contracts\IInvoiceController;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Repositories\InvoiceRepository;
use App\Requests\InvoiceRequest;
use App\Traits\RestResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class InvoiceController extends Controller implements IInvoiceController
{

    use RestResponse;

    /**
     * @var InvoiceRepository
     */
    private $invoiceRepository;

    public function __construct(InvoiceRepository $invoiceRepository)
    {
        $this->invoiceRepository = $invoiceRepository;
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $results = $this->invoiceRepository->all($request);
        return $this->success(
            $results
        );
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $results = $this->invoiceRepository->find($id);
        return $this->success(
            $results
        );
    }

    /**
     * @param InvoiceRequest $request
     * @return JsonResponse
     */
    public function store(InvoiceRequest $request): JsonResponse
    {
        $invoice = new Invoice($request->all());
        $result = $this->invoiceRepository->save($invoice);
        return $this->success(
            $result
        );
    }

    /**
     * @param InvoiceRequest $request
     * @param Invoice $invoice
     * @return JsonResponse
     */
    public function update(InvoiceRequest $request, Invoice $invoice): JsonResponse
    {
        $invoice->fill($request->all());

        if ($invoice->isClean()) {
            return $this->sendError('No changes detected.');
        }

        $result = $this->invoiceRepository->save($invoice);
        return $this->success(
            $result
        );
    }

    /**
     * @param Invoice $invoice
     * @return JsonResponse
     */
    public function destroy(Invoice $invoice): JsonResponse
    {
        $result = $this->invoiceRepository->destroy($invoice);
        return $this->success(
            $result
        );
    }

}
