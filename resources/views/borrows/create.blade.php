@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrow a Book</h1>
    <form action="{{ route('borrows.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="book_id" class="form-label">Select Book</label>
            <select name="book_id" id="book_id" class="form-select" required>
                <option value="">-- Select a Book --</option>
                @foreach ($books as $book)
                    <option value="{{ $book->id }}">{{ $book->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="borrower_name" class="form-label">Borrower's Name</label>
            <input type="text" name="borrower_name" id="borrower_name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="borrower_mobile" class="form-label">Borrower's Mobile</label>
            <input type="text" name="borrower_mobile" id="borrower_mobile" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="borrow_end_date" class="form-label">Borrow End Date</label>
            <input type="date" name="borrow_end_date" id="borrow_end_date" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary">Borrow Book</button>
    </form>
</div>
@endsection
