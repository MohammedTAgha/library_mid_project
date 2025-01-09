<?php

namespace App\Http\Controllers;

use App\Models\BookMohammedAgha;
use App\Models\BorrowedBookMohammedAgha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BorrowController  extends Controller
{

    public function index()
{
    $books = BookMohammedAgha::all();
    return view('borrows.create', compact('books'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'book_id' => 'required|exists:book_mohammed_aghas,id',
        'borrower_name' => 'required|string',
        'borrower_mobile' => 'required|string',
        'borrow_end_date' => 'required|date|after:today',
    ]);

    // Check if the book is already borrowed
    if (BorrowedBookMohammedAgha::where('book_id', $validated['book_id'])->exists()) {
        return redirect()->back()->withErrors(['book_id' => 'This book is already borrowed.']);
    }

    // Save the borrowed book record
    BorrowedBookMohammedAgha::create($validated);

    return redirect()->route('books.index')->with('success', 'Book borrowed successfully!');
}

    public function create()
{
    $books = BookMohammedAgha::all();
    return view('borrows.create', compact('books'));
}


}