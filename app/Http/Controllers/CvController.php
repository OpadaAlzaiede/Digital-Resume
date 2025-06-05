<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    /**
     * GET CV Data
     *
     * @return View
     */
    public function index(): View
    {
        return view('cv', ['cvData' => $this->getCvData()]);
    }

    /**
     * Download CV as PDF
     *
     * @return Response
     */
    public function download(): Response
    {
        $cvData = $this->getCvData();
        $pdf = Pdf::loadView('cv', ['cvData' => $cvData]);

        return $pdf->download(str_replace(' ', '_', $cvData['personal_info']['name']). '_CV.pdf');
    }

    /**
     * Parse CV JSON file
     *
     * @return array
     */
    private function parseCvJsonFile(): array
    {
        if (Storage::disk('public')->exists('resume.json')) {
            return Storage::disk('public')->json('resume.json');
        }

        return [];
    }

    /**
     * Get CV Data
     *
     * @return array
     */
    private function getCvData(): array
    {
        return Cache::remember('cvData', now()->addDay(), function () {
            return $this->parseCvJsonFile();
        });
    }
}
