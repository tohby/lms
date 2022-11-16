@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="py-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center py-4">
                <div class="d-block mb-4 mb-md-0">
                    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
                        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
                            <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Book burrows</li>
                        </ol>
                    </nav>
                </div>
                @if (Auth::user()->role == 2)
                    <div class="btn-toolbar mb-md-0">
                        <a href="/admin/burrows/create" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
                            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Burrow a Book
                        </a>
                    </div>
                @endif
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
                                            <td>{{ $book->status === 0 ? 'Not returned' : 'Returned' }}</td>
                                            <td>{{ $book->student->name }}</td>
                                            <td>Student Id #{{ $book->student->id }}</td>
                                            @unless(Auth::user()->role == 2)
                                                <td>
                                                    @if ($book->status === 0)
                                                        <form method="POST" action="{{ route('burrows.update', $book->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="status" value="1">
                                                            <button class="btn btn-success mr-2" type="submit">Accept</button>
                                                            @method('PUT')
                                                        </form>
                                                        <form method="POST" action="{{ route('burrows.update', $book->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="status" value="2">
                                                            <button class="btn btn-danger mr-2" type="submit">Cancel</button>
                                                            @method('PUT')
                                                        </form>
                                                    @elseif($book->status === 1)
                                                        <form method="POST" action="{{ route('burrows.update', $book->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="status" value="3">
                                                            <button class="btn btn-success mr-2" type="submit">Return</button>
                                                            @method('PUT')
                                                        </form>
                                                    @else
                                                        {{ $book->status === 2 ? 'Cancelled' : $book->status === 3 && 'Returned' }}
                                                    @endif
                                                </td>
                                            @endunless
                                            @if (Auth::user()->role == 2)
                                                <td>
                                                    {{ (($book->status === 1 ? 'Accepted' : $book->status === 0) ? 'Pending' : $book->status === 3) ? 'Returned' : 'Cancelled' }}
                                                </td>
                                            @endif
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
                                            <td>Student Id #{{ $book->student->id }}</td>
                                            @unless(Auth::user()->role == 2)
                                                <td>
                                                    @if ($book->status === 0)
                                                        <form method="POST" action="{{ route('burrows.update', $book->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="status" value="1">
                                                            <button class="btn btn-success mr-2" type="submit">Accept</button>
                                                            @method('PUT')
                                                        </form>
                                                        <form method="POST" action="{{ route('burrows.update', $book->id) }}">
                                                            @csrf
                                                            <input type="hidden" name="status" value="2">
                                                            <button class="btn btn-danger mr-2" type="submit">Cancel</button>
                                                            @method('PUT')
                                                        </form>
                                                    @else
                                                        {{ $book->status === 1 ? 'Accepted' : 'Cancelled' }}
                                                    @endif
                                                </td>
                                            @endunless
                                            @if (Auth::user()->role == 2)
                                                <td>
                                                    {{ ($book->status === 1 ? 'Accepted' : $book->status === 0) ? 'Pending' : 'Cancelled' }}
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
