<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Poem;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\Services\CommentServiceInterface;
use App\Http\Requests\frontend\CommentRequest;

class CommentController extends Controller
{
    public function __construct(private CommentServiceInterface $commentService)
    {
        $this->middleware('can:update,comment')->only('update');
        $this->middleware('can:delete,comment')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Poem $poem,CommentRequest $request)
    {
        $this->commentService->store($request->validated() + [
            'poem_id' => $poem->id,
            'user_id' => auth()->id()
        ]);

        return back()->with(['saved' => 'Comment Successfully Created.']);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Poem $poem,CommentRequest $request, Comment $comment)
    {
        $this->commentService->update($request->validated(),$comment);

        return back()->with(['saved' => 'Comment Successfully Updated.']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poem $poem,Comment $comment)
    {
        $this->commentService->destroy($comment);

        return back()->with(['deleted' => 'Comment Successfully Deleted.']);

    }
}
