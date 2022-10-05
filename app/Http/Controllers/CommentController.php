<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'comment' => 'required',
            'bookId' => 'required',
        ]);

        Comment::Create([
            'userId' => Auth::id(),
            'bookId' => $request->bookId,
            'comment' => $request->comment
        ]);
        return back()->with('success', 'Review Created Successfully!');
    }
}
