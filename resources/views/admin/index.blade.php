@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="mb-5">
            <h4 class="text-muted hello">Hello {{ Auth::user()->name }}</h4>
            {{-- <br> --}}
            <h2 class="greeting">Have a good day <span>&#128077;</span></h2>
        </div>
        <div class="row mb-3">
            <div class="col-12 col-lg-6 col-xl mb-3">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted mb-2 h6">
                                    Burrowed books
                                </h6>
                                <span class="h2 mb-0">
                                    {{ $upcomingBooksCount }}
                                </span>
                            </div>
                            <div class="col-auto">
                                <span class="h2 text-muted mb-0">
                                    <i class="fas fa-folder"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl mb-3">
                <div class="card rounded-lg">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted mb-2 h6">
                                    Overdue books
                                </h6>
                                <span class="h2 mb-0">
                                    {{ $overdueBooksCount }}
                                </span>
                            </div>
                            <div class="col-auto">
                                <span class="h2 text-muted mb-0">
                                    <i class="fa fa-exclamation"></i>
                                </span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Overdue books</h4>
                        <p class="card-category">Here is a list of books that are ovre due for return</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <tbody>
                                @foreach ($overdueBooks as $book)
                                    <tr>
                                        <td>{{ $book->book->id }}</td>
                                        <td>{{ $book->book->name }}</td>
                                        <td>{{ $book->burrow_date }}</td>
                                        <td>Due on {{ $book->return_date }}</td>
                                        <td>{{ $book->student->name }}</td>
                                        <td>{{ $book->student->id }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card strpied-tabled-with-hover">
                    <div class="card-header ">
                        <h4 class="card-title">Upcoming books</h4>
                        <p class="card-category">Here is a list of books you have burrowed and have not yet returned</p>
                    </div>
                    <div class="card-body table-full-width table-responsive">
                        <table class="table table-hover table-striped">
                            <tbody>
                                @foreach ($upcomingBooks as $book)
                                    <tr>
                                        <td>{{ $book->book->id }}</td>
                                        <td>{{ $book->book->name }}</td>
                                        <td>{{ $book->burrow_date }}</td>
                                        <td>Due on {{ $book->return_date }}</td>
                                        <td>{{ $book->status === 0 ? 'Not returned' : 'Returned' }}</td>
                                        <td>{{ $book->student->name }}</td>
                                        <td>{{ $book->student->id }}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
