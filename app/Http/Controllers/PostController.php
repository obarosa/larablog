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

        if(Like::find($request->get('postId')) && Like::find(Auth::id()) ){
            $like = Like::find($request->get('postId'));
            $like->user_id = Auth::id();
            $like->toggleLike();
            $like->save();
        }else{
            $like = new Like();
            $like->user_id = Auth::id();
            $like->post_id = $request->get('postId');
            $like->like=1;
            $like->save();
        }

    }

}
