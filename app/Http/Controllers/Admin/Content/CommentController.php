<?php

namespace App\Http\Controllers\admin\content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Content\CommentRequest;
use App\Models\Content\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:blog-manager');
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
        $comments = $comments->orderBy('created_at', 'asc')->where('commentable_type', '=', 'App\Models\Content\Comment')->Paginate(20);
        return view('admin.content.comment.index', compact('comments'));

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
    public function store(Request $request)
    {


        $request->validate([
            'comment' => 'required'
        ]);
        $input = $request->all();
        $input['approved']= 1 ;
        auth()->user()->comments()->create($input);

        return redirect()->route('admin.content.comment.index')
            ->with('swal-success','پاسخ با موفقیت ثبت شد');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view('admin.content.comment.show', compact('comment'));
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

        return redirect()->route('admin.content.comment.index')
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

        return redirect()->route('admin.content.comment.index')
            ->with('swal-success','نظر با موفقیت حذف شد');

    }

    public function status(Comment $comment){

        $comment->status = $comment->status == 0 ? 1 : 0;
        $result = $comment->save();
        if($result){
            if($comment->status == 0){
                return response()->json(['status' => true, 'checked' => false]);
            }
            else{
                return response()->json(['status' => true, 'checked' => true]);
            }
        }
        else{
            return response()->json(['status' => false]);
        }

    }
    public function approved(Comment $comment){

        $comment->approved = $comment->approved == 0 ? 1 : 0;
        $result = $comment->save();
        if($result){
            return redirect()->route('admin.content.comment.index')->with('swal-success', '  وضعیت نظر با موفقیت تغییر کرد');
        }
        else{
            return redirect()->route('admin.content.comment.index')->with('swal-error', '  وضعیت نظر با خطا مواجه شد');
        }

    }


    public function answer(CommentRequest $request, Comment $comment)
    {
        if ($comment->parent == null) {
            $inputs = $request->all();
            $inputs['author_id'] = 1;
            $inputs['parent_id'] = $comment->id;
            $inputs['commentable_id'] = $comment->commentable_id;
            $inputs['commentable_type'] = $comment->commentable_type;
            $inputs['approved'] = 1;
            $inputs['status'] = 1;
            $comment = Comment::create($inputs);
            return redirect()->route('admin.content.comment.index')->with('swal-success', '  پاسخ شما با موفقیت ثبت شد');
        }
        else{
            return redirect()->route('admin.content.comment.index')->with('swal-error', 'خطا');

        }
    }
}
