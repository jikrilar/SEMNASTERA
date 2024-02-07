<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;
use setasign\Fpdi\Fpdi;

class FillController extends Controller
{
    public function process(Request $request, Author $author)
    {
        if (auth()->user()->role == "admin") {
            $name = $author->User->name;
        }else {
            $name = auth()->user()->name;
        }

        $outputfile = public_path().'certificate.pdf';
        $this->fillPDF(public_path().'/master/certificate.pdf',$outputfile,$name);

        return response()->file($outputfile);
    }

    public function fillPDF($file,$outputfile,$name)
    {
        $fpdi = new Fpdi();
        $fpdi->setSourceFile($file);
        $template = $fpdi->importPage(1);
        $size = $fpdi->getTemplateSize($template);
        $fpdi->AddPage($size['orientation'],array($size['width'],$size['height']));
        $fpdi->useTemplate($template);
        $top = 75;
        $right = 115;
        $certicate_name = $name;
        $fpdi->SetFont("helvetica","",22);
        $fpdi->SetTextColor(25,26,25);
        $fpdi->Text($right,$top,$certicate_name);

        return $fpdi->Output($outputfile,'F');
    }
}
