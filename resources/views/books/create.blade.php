@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Add New Book</h1>
    

<div class="container">
    
    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="publish_date">Publish Date</label>
            <input type="date" name="publish_date" id="publish_date" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="author">Author</label>
            <input type="text" name="author" id="author" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save</button>
    </form>
</div>
</div>
@endsection
