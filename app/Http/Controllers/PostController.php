<?php

namespace App\Http\Controllers;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like; 


class PostController extends Controller
{
    //la recuperation des post
    public function index(){
        $posts=post::latest()->get();
        return view('home', compact('posts'));
    }

    public function create(){
        return view('create_post');
    }

    public function store(PostRequest $request){
        $data=$request->validated();
        $data['user_id'] = auth()->id();
        Post::create($data);
        return \redirect()->route('home')->with('success','post crrée par success');
    }

    public function edit(Post $post){
        return view('home',compact('post'));
    }

    public function update(Request $request, Post $post){
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required'
        ]);

        $post->update($data);

        return redirect()->route('home')->with('success','Post modifié avec succès');
    }

    public function destroy(Post $post){
        if(auth()->id() !== $post->user_id){
            abort(403);
        }

        $post->delete();

        return redirect()->route('home')->with('success','Post supprimé');
    }

    public function like(Post $post){
        $like = Like::where('user_id', auth()->id())
                    ->where('post_id', $post->id)
                    ->first();

        if($like){
            // Unlike
            $like->delete();
        }else{
            // Like
            Like::create([
                'user_id' => auth()->id(),
                'post_id' => $post->id
            ]);
        }

        return back();
    }

}

