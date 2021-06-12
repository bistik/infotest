<?php

namespace App\Http\Controllers;

use App\Http\Service\BladeServiceInterface;
use App\Http\Service\PdfServiceInterface;
use App\Http\Service\RequestToObjectServiceInterface;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\App;
use RuntimeException;

class PdfController
{
    public function __invoke(
        Request $request,
        RequestToObjectServiceInterface $objectService,
        BladeServiceInterface $bladeService,
        PdfServiceInterface $pdfService
    ) {
        $template = Template::where('id', $request->template_id)->first();
        if (!$template) {
            throw new RuntimeException('Missing Template');
        }
        $template->template = htmlspecialchars_decode($request->template);
        $template->save();

        $objectKeys = ['name', 'jobtitle'];
        $html = $bladeService->compileWith(
            $template->template,
            [
                'approver' => $objectService->createObject($request, $objectKeys, 'approver'),
                'owner' => $objectService->createObject($request, $objectKeys, 'owner'),
                'reviewer' => $objectService->createObject($request, $objectKeys, 'reviewer'),
                'name' => $request->input('name', ''),
                'interval' => $request->input('interval', ''),
                'audience' => $request->input('audience', ''),
                'today' => Carbon::now()->format('d/m/Y'),
            ]
        );

        return $pdfService->makeFromHtml($html);
    }
}
