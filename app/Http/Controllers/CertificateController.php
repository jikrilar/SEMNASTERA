<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use Barryvdh\DomPDF\Facade\Pdf;

class CertificateController extends Controller
{
    public function index()
    {
        return view('index',[
            'authors' => Author::all()
        ]);
    }

    public function generate()
    {
        $data = Author::all();

        $pdf = Pdf::loadView('certificate', [
            'authors' => $data
        ])->setPaper('a4', 'landscape');

        return $pdf->stream('certificate.pdf');
    }
}
