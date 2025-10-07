<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory;

    protected $fillable = [
        'borrow_id',
        'fine_type',
        'amount',
        'remarks',
    ];

    public function borrowRecord()
    {
        return $this->belongsTo(BorrowRecord::class, 'borrow_id');
    }
}
