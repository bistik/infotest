<?php
declare(strict_types=1);

namespace App\Http\Service;


interface PdfServiceInterface
{
    public function makeFromHtml(string $html);
}
