<?php

namespace App\Http\Controllers;

use App\Models\Forum;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    // Show all forum posts
    public function index()
    {
        $posts = Forum::latest()->get();
        return view('social.forum_index', compact('posts'));
    }

    // Admin version (optional)
    public function adminIndex()
    {
        $posts = Forum::latest()->get();
        return view('admin.posts', compact('posts'));
    }

    // Show form to create new post
    public function create()
    {
        return view('social.forum_create');
    }

    // Store new post
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'message' => 'required',
        ]);

        Forum::create($request->all());

        return redirect('/forum')->with('success', 'Post created!');
    }

    // Show single post
    public function show($id)
    {
        $post = Forum::findOrFail($id);
        return view('social.forum_show', compact('post'));
    }

    // Edit form
    public function edit($id)
    {
        $post = Forum::findOrFail($id);
        return view('social.forum_edit', compact('post'));
    }

    // Update existing post
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'message' => 'required',
        ]);

        $post = Forum::findOrFail($id);
        $post->update($request->all());

        return redirect('/forum')->with('success', 'Post updated!');
    }

    // Delete post
    public function destroy($id)
    {
        Forum::findOrFail($id)->delete();
        return redirect('/forum')->with('success', 'Post deleted!');
    }
}
