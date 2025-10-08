<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowRecord;
use App\Models\Equipment;
use App\Models\Fine;

class ReturnController extends Controller
{
    public function update(Request $request, $id)
    {
        $borrow = BorrowRecord::findOrFail($id);
        $borrow->return_date = now();
        $borrow->status = 'Returned';
        $borrow->save();

        $equipment = Equipment::find($borrow->equipment_id);
        $equipment->increment('quantity_available');

        // Late fine
        if (now()->gt($borrow->due_date)) {
            $lateDays = now()->diffInDays($borrow->due_date);
            Fine::create([
                'borrow_id' => $borrow->id,
                'fine_type' => 'Late',
                'amount' => $lateDays * 10, // Rs.10/day
            ]);
        }

        // Damage fine
        if ($request->condition === 'Damaged') {
            $equipment->increment('quantity_damaged');
            Fine::create([
                'borrow_id' => $borrow->id,
                'fine_type' => 'Damage',
                'amount' => 100,
                'remarks' => 'Equipment damaged',
            ]);
        }

        return back()->with('success', 'Item returned successfully!');
    }
}

