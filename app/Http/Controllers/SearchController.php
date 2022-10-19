<?php

namespace App\Http\Controllers;

use App\User;

use App\Book;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class SearchController extends Controller
{
    public function students(Request $request)
    {
        $this->validate($request, [
            'searchKey' => 'required',
        ]);
        $students = User::search($request->searchKey)->where('role', 2)->paginate(12);
        $totalCount = User::search($request->searchKey)->where('role', 2)->get()->count();
        return view('admin/students/index')
            ->with('students', $students)
            ->with('totalCount', $totalCount)
            ->with('searchKey', $request->searchKey);
    }

    public function librarians(Request $request)
    {
        $this->validate($request, [
            'searchKey' => 'required',
        ]);
        $librarians = User::search($request->searchKey)->where('role', 1)->paginate(12);
        $totalCount = User::search($request->searchKey)->where('role', 1)->get()->count();
        return view('admin/librarians/index')
            ->with('librarians', $librarians)
            ->with('totalCount', $totalCount)
            ->with('searchKey', $request->searchKey);
    }

    public function books(Request $request)
    {
        $this->validate($request, [
            'searchKey' => 'required',
        ]);

        $books = Book::search($request->searchKey)->paginate(10);
        return view('admin/books/index')->with('books', $books)->with('searchKey', $request->searchKey);
    }
}
