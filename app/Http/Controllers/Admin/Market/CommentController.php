<?php

namespace App\Http\Controllers\Admin\Market;

use App\Http\Controllers\Controller;
use App\Models\Content\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:product-manager');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::query();

        if($keyword = request('search')) {
            $comments->where('comment' , 'LIKE' , "%{$keyword}%")->orWhereHas('user' , function($query) use ($keyword) {
                $query->where('last_name' , 'LIKE' , "%{$keyword}%");
            });
        }
        $comments = $comments->orderBy('created_at', 'asc')->where('commentable_type', '=', 'App\Models\Market\Product')->Paginate(20);
        return view('admin.market.comment.index',compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $request->validate([
            'comment' => 'required'
        ]);
            $input = $request->all();
            $input['approved']= 1 ;
        auth()->user()->comments()->create($input);

        return redirect()->route('admin.market.comment.index')
            ->with('swal-success','پاسخ با موفقیت ثبت شد');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('admin.market.comment.show',compact('comment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $comment->update([ 'approved' => 1]);

        return redirect()->route('admin.market.comment.index')
            ->with('swal-success','نظر با موفقیت تایید شد');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment->forceDelete();

        return redirect()->route('admin.market.comment.index')
            ->with('swal-success','نظر با موفقیت حذف شد');

    }
}
