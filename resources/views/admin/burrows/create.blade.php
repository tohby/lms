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
                            <li class="breadcrumb-item active" aria-current="page">Create</li>
                        </ol>
                    </nav>
                    <h2 class="h4">Add new Book</h2>
                </div>
            </div>

            <div class="card card-body border-0 shadow table-wrapper table-responsive">
                <form action="{{ action('BurrowController@store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Book:</label>
                        <select class="form-control" id="book" name="book" required>
                            <option disabled selected value>-- Select an option --</option>
                            @foreach ($books as $book)
                                <option value="{{ $book->id }}">{{ $book->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Start date:</label>
                        <input type="date" class="form-control" name="startDate" placeholder="Enter start date" required>
                    </div>
                    <div class="form-group">
                        <label for="name">Return date:</label>
                        <input type="date" class="form-control" name="returnDate" placeholder="Enter return date"
                            required>
                    </div>
                    <div class="float-end">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
