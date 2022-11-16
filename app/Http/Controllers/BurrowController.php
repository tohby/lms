<?php

namespace App\Http\Controllers;

use App\Burrow;
use App\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BurrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role === 2) {
            $overdueBooks = Burrow::where('studentId', Auth::id())->whereDate('return_date', '>=', date('Y-m-d'))->get();
            $upcomingBooks = Burrow::where('studentId', Auth::id())->whereDate('return_date', '<=', date('Y-m-d'))->get();
        } else {
            $overdueBooks = Burrow::whereDate('return_date', '<=', date('Y-m-d'))->get();
            $upcomingBooks = Burrow::whereDate('return_date', '>=', date('Y-m-d'))->get();
        }
        $books = Book::get();
        return view('admin/burrows/index')->with('books', $books)->with('overdueBooks', $overdueBooks)->with('upcomingBooks', $upcomingBooks);
    }

    /**date
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $books = Book::get();
        return view('admin/burrows/create')->with('books', $books);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'book' => 'required|numeric',
            'return_date' => ['required|date'],
        ]);

        $book = Book::find($request->book);

        $numberOfBooksBurrowed = Burrow::where('bookId', $request->book)
            ->where('burrow_date', '<=', $request->returnDate)
            ->where('return_date', '>=', $request->startDate)->count();

        if ($numberOfBooksBurrowed >= $book->number_of_books) {
            return redirect('admin/burrows')->with('error', 'There are no more copies of this book available, please check back later or check with a later date');
        }

        Burrow::Create([
            'bookId' => $request->book,
            'studentId' => Auth::id(),
            'burrow_date' => $request->startDate,
            'return_date' => $request->returnDate,
        ]);

        return redirect('admin/burrows')->with('success', 'Enjoy your reading');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Burrow  $burrow
     * @return \Illuminate\Http\Response
     */
    public function show(Burrow $burrow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Burrow  $burrow
     * @return \Illuminate\Http\Response
     */
    public function edit(Burrow $burrow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Burrow  $burrow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Burrow $burrow)
    {
        //
        $burrow->status = $request->status;
        $burrow->save();

        return redirect('admin/burrows')->with('success', 'Status has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Burrow  $burrow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Burrow $burrow)
    {
        //
    }
}
