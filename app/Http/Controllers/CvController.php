<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;

class CvController extends Controller
{
    public function index(): View
    {
        return view('cv', ['cvData' => $this->parseCvJsonFile()]);
    }

    private function parseCvJsonFile(): array
    {
        $cvJsonFile = Storage::disk('public')->get('resume.json');

        return json_decode($cvJsonFile, true);
    }
}
