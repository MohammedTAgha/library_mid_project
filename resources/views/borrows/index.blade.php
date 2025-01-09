@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Borrowed Books</h1>

    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    @if ($borrowedBooks->isEmpty())
        <p>No borrowed books found.</p>
    @else
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Book Name</th>
                    <th>Borrower's Name</th>
                    <th>Borrower's Mobile</th>
                    <th>Borrow End Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($borrowedBooks as $borrowedBook)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $borrowedBook->book->name }}</td>
                    <td>{{ $borrowedBook->borrower_name }}</td>
                    <td>{{ $borrowedBook->borrower_mobile }}</td>
                    <td>{{ $borrowedBook->borrow_end_date }}</td>
                    <td>
                        <form action="{{ route('borrows.destroy', $borrowedBook->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this record?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
