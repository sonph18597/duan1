<?php

namespace App\Controllers;

use App\Controllers\Controller;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class PostController extends Model
{
    /**
     * Show the form to create a new blog post.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a new blog post.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate and store the blog post...
        $validated = $request->validate([
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        $validatedData = $request->validate([
            'title' => ['required', 'unique:posts', 'max:255'],
            'body' => ['required'],
        ]);

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'v1\.0' => 'required',
        ]);

        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'author.name' => 'required',
            'author.description' => 'required',
        ]);
    }
}
