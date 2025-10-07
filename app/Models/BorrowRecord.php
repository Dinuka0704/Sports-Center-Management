<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowRecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'equipment_id',
        'borrow_date',
        'due_date',
        'return_date',
        'status',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function equipment()
    {
        return $this->belongsTo(Equipment::class);
    }

    public function fines()
    {
        return $this->hasMany(Fine::class, 'borrow_id');
    }
}
