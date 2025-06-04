<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index(): View
    {
        $cvData = Cache::remember('cvData', now()->addDay(), function () {
            return $this->parseCvJsonFile();
        });

        return view('cv', ['cvData' => $cvData]);
    }

    public function download(): Response
    {
        $cvData = Cache::remember('cvData', now()->addDay(), function () {
            return $this->parseCvJsonFile();
        });

        $pdf = Pdf::loadView('cv', ['cvData' => $cvData]);
        Storage::disk('public')->put('resume.pdf', $pdf->output());
        return $pdf->download($cvData['personal_info']['name'] . '_CV.pdf');
    }

    private function parseCvJsonFile(): array
    {
        if (Storage::disk('public')->exists('resume.json')) {
            return Storage::disk('public')->json('resume.json');
        }

        return [];
    }
}
