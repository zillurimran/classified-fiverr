<?php

namespace App\Http\Controllers;

use App\Models\AdComment;
use App\Models\AdReply;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdCommentController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'ad_id'     => 'required',
            'name'      => 'required|string',
            'email'     => 'required|email',
            'comment'   => 'required|string'
        ]);

        $comment = AdComment::create($request->except('_token')+['created_at'=> Carbon::now()]);
        return response()->json([
            'status' => 'success'
        ]);
    }

    public function replyStore(Request $request){
        
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'replies' => 'required|string'
        ],[
            'replies.required' => 'Message is required',
        ]);

         AdReply::create([
            'comment_id' => $request->comment_id,
            'name' =>$request->name,
            'email' => $request->email,
            'replies' =>$request->replies
        ]);

        return back();
    }
}
