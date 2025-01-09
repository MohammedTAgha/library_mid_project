<?php

namespace App\Http\Controllers;

use App\Models\BookMohammedAgha;
use App\Models\BorrowedBookMohammedAgha;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LibraryController extends Controller
{
    // CRUD Operations for Books

    public function index()
    {

        $books = BookMohammedAgha::all();
        return view('books.index', compact('books'));
    }

    public function show($id){
        $book = BookMohammedAgha::findOrFail($id);
        return(view('books.show',compact('book')));
    }
    public function create()
    {
        return view('books.create');
    }
    public function edit($id)
    {
        $book = BookMohammedAgha::findOrFail($id);
        return view('books.edit', compact('book'));
    }
    public function store(Request $request)
    {
       
        $validated = $request->validate([
            'name' => 'required|string',
            'publish_date' => 'required|date|before:today',
            'author' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) { 
            $validated['image'] = $request->file('image')->store('book_images', 'public');
        }

        $book = BookMohammedAgha::create($validated);
        // return response()->json($book);
        try {
            return redirect()->route('books.index')->with('success', 'Book '.$book->name.'added successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('books.index')->with('success', 'Book added successfully!');
        }
    }

    public function update(Request $request, $id)
    {
        // Update a book
        $book = BookMohammedAgha::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string',
            'publish_date' => 'required|date|before:today',
            'author' => 'required|string',
            'image' => 'nullable|image',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('book_images', 'public');
        }

        $book->update($validated);
         // return response()->json($book);
         try {
            return redirect()->route('books.index')->with('success', 'Book '.$book->name.'updated successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('books.index')->with('success', 'Book updated successfully!');
        }
    }

    public function destroy($id)
    {
        // Delete a book
        $book = BookMohammedAgha::findOrFail($id);
        $book->delete();

        try {
            return redirect()->route('books.index')->with('success', 'Book '.$book->name.'deleted successfully!');
        } catch (\Throwable $th) {
            return redirect()->route('books.index')->with('success', 'Book deleted successfully!');
        }
    }

    // Borrowed Books Operations

    public function borrow(Request $request)
    {
        // Add a borrowed book
        $validated = $request->validate([
            'book_id' => 'required|exists:books_mohammed_agha,id|unique:borrowed_books_mohammed_agha,book_id',
            'borrower_name' => 'required|string',
            'borrower_mobile' => 'required|string',
            'borrow_end_date' => 'required|date|after:today',
        ]);

        $borrowedBook = BorrowedBookMohammedAgha::create($validated);
        return response()->json($borrowedBook);
    }

    public function borrowedBooks()
    {
        // View all borrowed books
        $borrowedBooks = BorrowedBookMohammedAgha::with('book')->get();
        return response()->json($borrowedBooks);
    }
}
