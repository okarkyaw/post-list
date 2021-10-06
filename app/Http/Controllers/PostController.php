<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Policies\PostPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Requests\PostSaveRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\Response;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = \App\Models\Post::all()->reverse();
        return view('post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostSaveRequest $request)
    {
        $customer = Auth::guard('customer')->user();
        $customer->posts()->create($request->validated());
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('post.show',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // if (! Gate::allows('edit-post', $post)) {
        //     abort(403);
        // }
         return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
     {
        $customer=Auth::guard('customer')->user();
        if (Gate::forUser($customer)->allows('update-post', $post)) {
            // The user can update the post...
            $post->title = $request->title;
            $post->content = $request->content;
            $post->save();
            return redirect(route('post.show',$post->id));
        }else{
            abort(403);
        }
        // $this->authorize('update', $post);
        // $post->title = $request->title;
        // $post->content = $request->content;
        // $post->save();
        // return redirect(route('post.show',$post->id));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //
    }
}
