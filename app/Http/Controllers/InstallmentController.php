<?php

namespace App\Http\Controllers;

use App\Models\Installment;
use App\Models\Investor;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    public function index($investor_id)
    {
        $installments = Installment::where('investor_id', $investor_id)->get();
        return view('installments.index', compact('installments'));
    }

    public function create($investor_id)
    {
        return view('installments.create', compact('investor_id'));
    }

    public function store(Request $request, $investor_id)
    {
        $data = $request->validate([
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'status' => 'required|string',
        ]);

        $data['investor_id'] = $investor_id;

        Installment::create($data);
        return redirect()->route('investors.installments', ['investor_id' => $investor_id]);
    }
}
