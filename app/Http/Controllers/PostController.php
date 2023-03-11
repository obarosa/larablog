<?php

namespace App\Http\Controllers;

use App\Models\Like;
use Carbon\Carbon;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts', compact('posts'));
    }

    // public function create()
    // {
    //     return view()
    // }

    public function save(Request $request)
    {
        $currentTime = Carbon::now();

        $post = new Post();
        $post->user_id = Auth::id();
        $post->title = $request->get('postTitle');
        $post->content = $request->get('postDescription');
        $post->posted_at = $currentTime->toDateTimeString();
        $post->save();
    }

    public function like(Request $request)
    {
        // Check if user already like the post
        $userLikedPost = Like::where('user_id', auth()->user()->id)
            ->where('post_id', $request->get('postId'))
            ->first();
        if ($userLikedPost) {
            // If user have like, change boolean
            $userLikedPost->toggleLike()->save();
        } else {
            // If user dont have a like on post, add like
            $like = new Like;
            $like->user_id = auth()->user()->id;
            $like->post_id = $request->get('postId');
            $like->like = 1;
            $like->save();
        }
    }
}
