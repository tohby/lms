<?php

namespace App\Http\Controllers;

use App\User;
use App\Burrow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (Auth::user()->role === 2) {
            $overdueBooks = Burrow::where('studentId', Auth::id())->whereDate('return_date', '<=', date('Y-m-d'))->get();
            $upcomingBooks = Burrow::where('studentId', Auth::id())->whereDate('return_date', '>=', date('Y-m-d'))->get();
        } else {
            $overdueBooks = Burrow::whereDate('return_date', '>=', date('Y-m-d'))->get();
            $upcomingBooks = Burrow::whereDate('return_date', '<=', date('Y-m-d'))->get();
        }
        return view('admin/index')->with('overdueBooks', $overdueBooks)->with('upcomingBooks', $upcomingBooks);
    }
}
