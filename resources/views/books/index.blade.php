@extends('layouts.app')

@section('content')
<div class="container">
    <h1>showing avilable books</h1>
    {{-- @dump($books); --}}
    <div class="container">
        <h1>Books</h1>
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Publish Date</th>
                    <th>Author</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $book)
                <tr>
                    <td>{{ $book->name }}</td>
                    <td>{{ $book->publish_date }}</td>
                    <td>{{ $book->author }}</td>
                    <td>
                        @if ($book->image)
                        <img src="{{ asset('storage/' . $book->image) }}" alt="Book Image" style="width: 50px;">
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Page content here -->
</div>
@endsection
