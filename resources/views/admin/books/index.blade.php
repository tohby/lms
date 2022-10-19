@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                <div class="d-block mb-4 mb-md-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Books</li>
                        </ol>
                    </nav>
                    <h2 class="h4">All Books</h2>
                </div>
                @unless(Auth::user()->role == 2)
                    <div class="btn-toolbar mb-2 mb-md-0">
                        <a href="/admin/books/create" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Add Book
                        </a>
                    </div>
                @endunless
            </div>
            <div class="table-settings mb-4">
                <div class="row align-items-center justify-content-between">
                    <div class="col col-md-6 col-lg-3 col-xl-4">
                        <form id="books-search-form" action="{{ action('SearchController@books') }}" method="POST">
                            @csrf
                            <div class="input-group me-2 me-lg-3 fmxw-400">
                                <span class="input-group-text">
                                    <svg class="icon icon-xs" x-description="Heroicon name: solid/search"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                        aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </span>
                                <input type="text" class="form-control" name="searchKey" placeholder="Search books"
                                    value="{{ $searchKey }}" required>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-12 px-0 mb-4">
                @if ($books->count() < 1)
                    No books! Create a new one
                @else
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-centered table-nowrap mb-0 rounded">
                                    <thead class="thead-light">
                                        <tr>
                                            <th class="border-0 rounded-start">Book ID</th>
                                            <th class="border-0"></th>
                                            <th class="border-0">Name</th>
                                            <th class="border-0">Description</th>
                                            {{-- <th class="border-0">Status</th> --}}
                                            <th class="border-0">#</th>
                                            {{-- <th class="border-0">Travel &amp; Local Change</th>
                                    <th class="border-0">Widgets</th>
                                    <th class="border-0 rounded-end">Widgets Change</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td class="border-0 fw-bold">Book #{{ $book->id }}</td>

                                                <td class="border-0 fw-bold "><img width="60px"
                                                        src="/storage/books/{{ $book->image }}"
                                                        alt="{{ $book->name }} image"></td>
                                                <td class="border-0 fw-bold">{{ $book->name }}</td>
                                                <td class="border-0 fw-bold">{{ $book->description }}</td>

                                                <td class="border-0 fw-bold">
                                                    <a class="btn btn-default mt-4 mr-2"
                                                        href="/admin/books/{{ $book->id }}">View</a>
                                                    @unless(Auth::user()->role == 2)
                                                        <a class="btn btn-primary mt-4 mr-2"
                                                            href="/admin/books/{{ $book->id }}/edit">Edit</a>
                                                        <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                                                            {{ csrf_field() }}
                                                            {{ method_field('delete') }}
                                                            <button class="btn btn-danger mt-4" type="submit">Delete</button>
                                                        </form>
                                                    @endunless

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
