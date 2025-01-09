@extends('layouts.app')

@section('content')
<div class="container">
    <h1>showing avilable books</h1>
    {{-- @dump($books); --}}
    <div class="container">
         
        <a href="{{ route('books.create') }}" class="btn btn-primary mb-3">Add New Book</a>
        <div class="row">
        @foreach ($books as $book)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                @if ($book->image)
                <img src="{{ asset('storage/' . $book->image) }}" class="card-img-top" alt="{{ $book->name }}">
                @else
                <img src="https://via.placeholder.com/150" class="card-img-top" alt="No Image">
                @endif
                <div class="card-body">
                    <h5 class="card-title"><a  href="{{ route('books.show', $book->id) }}">{{ $book->name }}</a></h5>
                    <p class="card-text">
                        <strong>Author:</strong> {{ $book->author }}<br>
                        <strong>Publish Date:</strong> {{ $book->publish_date }}
                    </p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('books.show', $book->id) }}" class="btn btn-warning btn-sm">diatails</a>
                        <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('books.destroy', $book->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        </div>
    </div>
    <!-- Page content here -->
</div>
@endsection
