<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Barryvdh\DomPDF\Facade\Pdf;

class DownloedController extends Controller
{
    public function show($id)
    {
        $invoice = Invoice::findOrFail($id);

        return view('admin.downloedpdf', compact('invoice'));
    }

    public function downloadPdf($id)
    {
        $invoice = Invoice::findOrFail($id);

        $pdf = Pdf::loadView('admin.downloedpdf', compact('invoice'))
            ->setPaper('A4', 'portrait');

        return $pdf->download('invoice-' . $invoice->id . '.pdf');
    }
}
