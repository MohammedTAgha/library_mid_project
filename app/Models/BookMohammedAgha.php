<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookMohammedAgha extends Model
{
    use HasFactory;

    protected $table = 'books_mohammed_agha';
    
    protected $fillable = [
        'name',
        'publish_date',
        'author',
        'image',
    ];

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBookMohammedAgha::class, 'book_id');
    }
}
