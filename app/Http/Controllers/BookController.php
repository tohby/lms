<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        $searchKey = '';
        return view('admin/books/index')->with('books', $books)->with('searchKey', $searchKey);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/books/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'price' => 'required|numeric',
            'description' => ['required'],
            'image' => 'required|image',
            'number_of_books' => 'required|numeric',
        ]);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/books', $fileNameToStore);
        }

        Book::Create([
            'name' => $request->name,
            'author' => $request->author,
            'genre' => $request->genre,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $fileNameToStore,
            'number_of_books' => $request->number_of_books
        ]);

        return redirect('admin/books')->with('success', 'New Book has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('admin/books/show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('admin/books/edit')->with('book', $book);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $this->validate($request, [
            'name' => 'required',
            'author' => 'required',
            'genre' => 'required',
            'price' => 'required|numeric',
            'description' => ['required'],
            'number_of_books' => 'required|numeric',
            // 'image' => 'required|image',
        ]);

        if ($request->hasFile('image')) {
            $fileNameWithExt = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;
            $path = $request->file('image')->storeAs('public/books', $fileNameToStore);
            $book->image = $fileNameToStore;
        }

        $book->name = $request->name;
        $book->author = $request->author;
        $book->genre = $request->genre;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->number_of_books = $request->number_of_books;
        $book->save();

        return redirect('admin/books')->with('success', 'Book has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return redirect('/admin/books')->with('success', 'Book has been removed');
    }
}
