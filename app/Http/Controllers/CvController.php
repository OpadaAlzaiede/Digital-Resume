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
        if(Storage::disk('public')->exists('resume.json')){
            return Storage::disk('public')->json('resume.json');
        }

        return [];
    }
}
