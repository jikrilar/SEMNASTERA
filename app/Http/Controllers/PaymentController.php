<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Archive;
use App\Models\Paper;
use App\Models\Payment;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->role == 'author') {
            $paper_id = Paper::where('author_id',auth()->user()->id)->first()->id;
            $payments = Payment::where('paper_id', $paper_id)->get();
        } else {
            $payments = Payment::all();
        };

        if (auth()->user()->role == 'author') {
            return view('payment',[
                'payments' => $payments,
                'reviews' => Review::where('paper_id', $paper_id)->where('status', 'passed')->get()
            ]);
        } else {
            return view('payment',[
                'payments' => $payments,
            ]);
        };


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'transfer_slip' => 'required|file|image'
        ]);

        $validatedData['transfer_slip'] = $request->file('transfer_slip')->store('transfer-slip');

        $validatedData['status'] = 'pending';

        $validatedData['invoice_code'] = 'SmNsTr'.Str::random(5);

        $agenda_id = Agenda::where('status','occur')->first()->id;

        $archive_id = Archive::where('agenda_id',$agenda_id)->first()->id;

        $validatedData['paper_id'] = Paper::where('author_id',auth()->user()->id)->where('archive_id',$archive_id)->first()->id;

        Payment::create($validatedData);

        return back()->with('message','Bukti Berhasil Dikirim. Menunggu Konfirmasi Admin');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $payment->update([
            'status' => 'confirmed'
        ]);

        return back()->with('message','Berhasil Konfirmasi Pembayaran');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        //
    }
}
