@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                <div class="d-block mb-4 mb-md-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/books">Books</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $book->name }}</li>
                        </ol>
                    </nav>
                    {{-- <h2 class="h4">Add new Book</h2> --}}
                </div>
            </div>

            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <form action="{{ action('BookController@update', $book->id) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" class="form-control" name="name" placeholder="Enter book name"
                            value="{{ $book->name }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Author:</label>
                        <input type="text" class="form-control" name="author" placeholder="Enter Author's name"
                            value="{{ $book->author }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Genre:</label>
                        <input type="text" class="form-control" name="genre" placeholder="Enter genre name"
                            value="{{ $book->genre }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Price:</label>
                        <input type="number" class="form-control" name="price" placeholder="Enter book price"
                            value="{{ $book->price }}">
                    </div>
                    <div class="form-group">
                        <label for="name">No. of books:</label>
                        <input type="number" class="form-control" name="number_of_books" placeholder="Enter number of book"
                            value="{{ $book->number_of_books }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Description:</label>
                        <textarea rows="3" class="form-control" name="description" placeholder="Enter product description">{{ $book->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose room image</label>
                        </div>
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    @method('PUT')
                </form>
            </div>
        </div>
    </div>
@endsection
