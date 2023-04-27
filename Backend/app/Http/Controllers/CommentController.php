<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use App\Http\Resources\CommentResource;
use App\Traits\HttpResponses;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    use HttpResponses;

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request)
    {
        $request->validated();

        $comment = Comment::create([
            'user_id' => Auth::id(),
            'episode_id' => $request->episode_id,
            'comment' => $request->comment
        ]);

        return $this->success(new CommentResource($comment));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        if (Auth::user()->id != $comment->user_id) {
            return $this->error('', 'You are not authorized to update this comment.', 403);
        }

        $request->validated();

        $comment->update($request->all());

        return $this->success(new CommentResource($comment));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if (Auth::user()->id != $comment->user_id) {
            return $this->error('', 'You are not authorized to update this comment.', 403);
        }

        $comment->delete();
    }
}
