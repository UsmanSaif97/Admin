<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    // Retrieve all investments
    public function index()
    {
        $investments = Investment::all();
        return response()->json($investments);
    }

    // Retrieve a single investment by ID
    public function show($id)
    {
        $investment = Investment::find($id);

        if (!$investment) {
            return response()->json(['message' => 'Investment not found'], 404);
        }

        return response()->json($investment);
    }

    // Create a new investment
    public function store(Request $request)
    {
        $request->validate([
            'investor_id' => 'required|integer|exists:investors,id',
            'amount' => 'required|numeric',
            'investment_date' => 'required|date',
        ]);

        $investment = Investment::create($request->all());

        return response()->json($investment, 201);
    }

    // Update an existing investment
    public function update(Request $request, $id)
    {
        $investment = Investment::find($id);

        if (!$investment) {
            return response()->json(['message' => 'Investment not found'], 404);
        }

        $request->validate([
            'investor_id' => 'integer|exists:investors,id',
            'amount' => 'numeric',
            'investment_date' => 'date',
        ]);

        $investment->update($request->all());

        return response()->json($investment);
    }

    // Delete an investment
    public function destroy($id)
    {
        $investment = Investment::find($id);

        if (!$investment) {
            return response()->json(['message' => 'Investment not found'], 404);
        }

        $investment->delete();

        return response()->json(['message' => 'Investment deleted']);
    }

    // Get total investments for a specific investor
    public function totalInvestments($investor_id)
    {
        $total = Investment::where('investor_id', $investor_id)->sum('amount');
        return response()->json(['total_investments' => $total]);
    }
}
