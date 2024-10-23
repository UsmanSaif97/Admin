<?php

namespace App\Http\Controllers;

use App\Models\Investor; // Ensure you have this model
use Illuminate\Http\Request;

class InvestorController extends Controller
{
    public function index()
    {
        // Retrieve all investors
        return response()->json(Investor::all(), 200);
    }

    public function show($id)
    {
        // Retrieve a specific investor by ID
        $investor = Investor::find($id);

        if (!$investor) {
            return response()->json(['message' => 'Investor not found'], 404);
        }

        return response()->json($investor, 200);
    }

    public function store(Request $request)
    {
        // Validate and create a new investor
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:investors,email',
            'phone_number' => 'nullable|string|max:15',
            'investment_amount' => 'required|numeric',
            // Add other necessary validation rules
        ]);

        $investor = Investor::create($request->all());

        return response()->json($investor, 201); // Return newly created investor
    }

    public function update(Request $request, $id)
    {
        // Validate and update an existing investor
        $investor = Investor::find($id);

        if (!$investor) {
            return response()->json(['message' => 'Investor not found'], 404);
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:investors,email,' . $id,
            'phone_number' => 'nullable|string|max:15',
            'investment_amount' => 'required|numeric',
            // Add other necessary validation rules
        ]);

        $investor->update($request->all());

        return response()->json($investor, 200); // Return updated investor
    }

    public function destroy($id)
    {
        // Delete an existing investor
        $investor = Investor::find($id);

        if (!$investor) {
            return response()->json(['message' => 'Investor not found'], 404);
        }

        $investor->delete();

        return response()->json(['message' => 'Investor deleted successfully'], 200);
    }
}
