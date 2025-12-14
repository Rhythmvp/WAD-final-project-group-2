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

        Forum::create([
            'title' => $request->title,
            'category' => $request->category,
            'message' => $request->message,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('forum.index')->with('success', 'Post created!');
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
        
        // Ensure user can only update their own posts (or admin)
        if ($post->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        
        $post->update([
            'title' => $request->title,
            'category' => $request->category,
            'message' => $request->message,
        ]);

        return redirect()->route('forum.index')->with('success', 'Post updated!');
    }

    // Delete post
    public function destroy($id)
    {
        $post = Forum::findOrFail($id);
        
        // Ensure user can only delete their own posts (or admin)
        if ($post->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }
        
        $post->delete();
        return redirect()->route('forum.index')->with('success', 'Post deleted!');
    }
}
