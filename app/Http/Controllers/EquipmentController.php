<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Equipment;

class EquipmentController extends Controller
{
    public function index()
    {
        $equipment = Equipment::all();
        return view('equipment.index', compact('equipment'));
    }

    public function create()
    {
        return view('equipment.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'quantity_total' => 'required|integer|min:1',
        ]);

        Equipment::create([
            'name' => $request->name,
            'category' => $request->category,
            'quantity_total' => $request->quantity_total,
            'quantity_available' => $request->quantity_total,
        ]);

        return redirect()->route('equipment.index')->with('success', 'Equipment added successfully!');
    }
}

