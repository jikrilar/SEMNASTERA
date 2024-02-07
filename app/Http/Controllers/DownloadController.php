<?php

namespace App\Http\Controllers;

use App\Models\Paper;
use Illuminate\Http\Request;

class DownloadController extends Controller
{
    public function paper(Paper $paper)
    {
        $pathToFile = storage_path("app/public/{$paper->file}");
        return response()->download($pathToFile);
    }

    public function paperTemplate()
    {
        $pathToFile = storage_path("app/public/");
        return response()->download($pathToFile);
    }
}
