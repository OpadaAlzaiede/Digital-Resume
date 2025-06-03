<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
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

    private function parseCvJsonFile(): array
    {
        if (Storage::disk('public')->exists('resume.json')) {
            return Storage::disk('public')->json('resume.json');
        }

        return [];
    }
}
