<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $comments = Comment::where('post_id' , $post->id)->latest()->get();
        return view('comments.index' , compact('post' , 'comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view('comments.create' , compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request , Post $post)
    {
        $data = $request->validated();

        $data['post_id'] = $post->id;
        $data['user_id'] = Auth::id();

        Comment::create($data);

        session()->flash('success', __('messages.added_successfully'));
        return redirect()->route('comments.index' , $post);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post , Comment $comment)
    {
        return view('comments.edit' , compact('comment' , 'post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCommentRequest  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCommentRequest $request,Post $post ,  Comment $comment)
    {
        $data = $request->validated();

        $comment->update($data);

        session()->flash('success', __('messages.added_successfully'));
        return redirect()->route('comments.index' , $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post , Comment $comment)
    {
        $comment->delete();
        session()->flash('success', __('messages.deleted_successfully'));
        return back();
    }
}
