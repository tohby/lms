@extends('layouts.master')

@section('content')
    <div class="container-fluid">
        <div class="h4">Books</div>
        <div class="row">
            <div class="col-lg-10">
                <ol class="breadcrumb bg-transparent p-0">
                    <li class="breadcrumb-item"><a href="/admin">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="/admin/books">Books</a></li>
                    <li class="breadcrumb-item active" aria-current="page">View <b>{{ $book->name }}</li>
                </ol>
            </div>
            @unless(Auth::user()->role == 2)
                <div class="col-lg-2 d-flex">
                    <a href="{{ $book->id }}/edit" class="btn btn-default mr-4">Edit</a>
                    <form method="POST" action="{{ route('books.destroy', $book->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('delete') }}
                        <button class="btn btn-danger float-right" type="submit">Delete</button>
                    </form>
                </div>
            @endunless

        </div>
        <div class="row my-4">
            <div class="col-md-12">
                <img src="/storage/books/{{ $book->image }}" alt="{{ $book->name }}" class="full img-fluid"
                    width="300px">
                <div class="card p-1 mt-5" style="width: 60rem;">
                    <div class="card-body">
                        <h4 class="card-title font-weight-bold">{{ $book->name }}</h4>
                        <p class="font-weight-bold">Author: {{ $book->author }}</p>
                        <p class="font-weight-bold">Rental price: {{ $book->price }}$</p>
                        <p>Description: {{ $book->description }}</p>
                        <p>Genre: {{ $book->genre }}</p>
                    </div>
                </div>

                <section class="mt-2 mb-2">
                    Reviews:
                    @foreach ($book->comments as $comment)
                        <div class="card p-1 mt-2" style="width: 60rem;">
                            <div class="card-body">
                                <span class="font-weight-bold">{{ $comment->user->name }}</span>
                                <p>{{ $comment->comment }}</p>
                            </div>
                        </div>
                    @endforeach
                </section>
                @if (Auth::user()->role == 2)
                    <div class="col-lg-5">
                        <form action="{{ action('CommentController@store') }}" class="ra-form" method="post">
                            @csrf

                            <input type="hidden" name="bookId" value="{{ $book->id }}">
                            <div class="form-group">
                                <label for="name">Comment:</label>
                                <textarea rows="3" class="form-control" placeholder="Your Review" name="comment"></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
