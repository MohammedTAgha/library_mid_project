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
    $borrowedBooks = BorrowedBookMohammedAgha::with('book')->get();
    return view('borrows.index', compact('borrowedBooks'));
}
public function store(Request $request)
{
    $validated = $request->validate([
        'book_id' => 'required',
        'borrower_name' => 'required|string',
        'borrower_mobile' => 'required|string',
        'borrow_end_date' => 'required|date|after:today',
    ]);

    

    // Save the borrowed book record
    BorrowedBookMohammedAgha::create($validated);

    return redirect()->route('borrows.index')->with('success', 'Book borrowed successfully!');
}
    public function create()
{
    $books = BookMohammedAgha::all();
    return view('borrows.create', compact('books'));
}
public function destroy($id)
{
    $borrowedBook = BorrowedBookMohammedAgha::findOrFail($id);
    $borrowedBook->delete();

    return redirect()->route('borrows.index')->with('success', 'Borrowed book record deleted successfully!');
}

}