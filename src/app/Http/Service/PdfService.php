<?php
declare(strict_types=1);

namespace App\Http\Service;

use Illuminate\Support\Facades\App;

class PdfService implements PdfServiceInterface
{

    public function makeFromHtml(string $html)
    {
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($html);

        return $pdf->stream();
    }
}
