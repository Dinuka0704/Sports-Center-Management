<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BorrowRecord;
use App\Models\Student;
use App\Models\Equipment;

class BorrowController extends Controller
{
    public function store(Request $request)
    {
        $student = Student::where('student_id', $request->student_id)->firstOrFail();
        $equipment = Equipment::findOrFail($request->equipment_id);

        if ($equipment->quantity_available <= 0) {
            return back()->with('error', 'No available items to borrow.');
        }

        BorrowRecord::create([
            'student_id' => $student->id,
            'equipment_id' => $equipment->id,
            'borrow_date' => now(),
            'due_date' => now()->addDays(7), // 7-day borrow period
        ]);

        $equipment->decrement('quantity_available');

        return back()->with('success', 'Item borrowed successfully!');
    }
}
