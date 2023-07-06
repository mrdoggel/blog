<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;

class PostController extends Controller
{
    public function createPost(Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $data['user_id'] = auth()->id();
        Post::create($data);
        return redirect('/home');
    }

    public function showEditPost(Post $post) {
        return view('singlePost', ['post' => $post]);
    }

    public function editPost(Post $post, Request $request) {
        $data = $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $data['title'] = strip_tags($data['title']);
        $data['body'] = strip_tags($data['body']);
        $post->update($data);
        return redirect('/home');
    }

    public function deletePost(Post $post) {
        $post->delete();
        return redirect('/home');
    }

    public function showAllPosts() {
        return PostResource::collection(Post::all());
    }

    public function showPost(Post $post) {
        return new PostResource(Post::findOrFail($post->id));
    }
}
