<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BorrowedBookMohammedAgha extends Model
{
    use HasFactory;

    protected $table = 'borrowed_books_mohammed_agha';

    protected $fillable = [
        'book_id',
        'borrower_name',
        'borrower_mobile',
        'borrow_end_date',
    ];

    public function book()
    {
        return $this->belongsTo(BookMohammedAgha::class, 'book_id');
    }
}
