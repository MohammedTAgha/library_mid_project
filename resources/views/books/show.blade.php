@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>{{ $book->name }}</h3>
        </div>
        <div class="row g-0">
            <div class="col-md-4">
                @if ($book->image)
                    <img src="{{ asset('storage/' . $book->image) }}" class="img-fluid rounded-start" alt="{{ $book->name }}">
                @else
                    <img src="https://via.placeholder.com/300x400" class="img-fluid rounded-start" alt="No Image">
                @endif
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Book Details</h5>
                    <p class="card-text">
                        <strong>name:</strong> {{ $book->name }} <br>
                        <strong>author:</strong> {{ $book->author }} <br>
                        <strong>aublish Date:</strong> {{ $book->publish_date }} <br>
                    </p>
                    <a href="{{ route('books.index') }}" class="btn btn-primary">Back to Books</a>
                    <a href="{{ route('books.edit', $book->id) }}" class="btn btn-warning">Edit Book</a>
                    <form action="{{ route('books.destroy', $book->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this book?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">aelete Book</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @dump($book->borrowedBooks()) --}}
@endsection
