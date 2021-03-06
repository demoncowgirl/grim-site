<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Collective\Html\Eloquent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Comment;
use App\Post;
use App\User;
use Session;

class CommentsController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function getSingle($id){

      // fetch from database based on $slug
      $comment = Comment::where('id', '=', $id)->first();
      // return the view and pass in the post object
      return view('comments.single')->withComment($comment);
    }

    public function index()
    {
      // create a variable and store all of our blog comments in it
      $comments = Comment::orderBy('id', 'asc')->paginate(10);
      // // return a view and pass in the variable
      return view('comments.index', ['comments' => $comments]);
    }


     public function store(Request $request, $id)
     {
       $post = Post::find($id);

       $validatedData = $request->validate([
        'comment' => 'required|min:5|max:2000|unique:comments',
      ],
        $messages = [
            // 'username.max' => 'How can you remember all of that?! Shorten this up, please.',
            // 'username.required' => 'Don\'t you want everyone to know who posted this?',
            'comment.required' => 'Don\'t leave without telling us how you feel!',
            'comment.min' => 'We know you have more to say. Your message must be longer',
            'comment.max' => 'Wow! You have a lot to say! If it won\'t fit here, continue on another comment.',
            'comment.unique' => 'Be original! Someone has already used this comment.'
      ]);

          $comment = new Comment();
          $comment-> username = auth()->user() -> username;
          $comment-> comment = $request-> comment;
          $comment-> post() -> associate($post -> id);
          $comment-> approved = false;
          // $comment -> approved_at = Carbon::now();

          $comment->save();

        Session::flash('success', 'Comment was submitted successfully! It will not be displayed until approved by the admin.');
        return redirect()->route('posts.show', $post -> id);
      }


    public function show($id)
    {
      $comment = Comment::find($id);
      return view('comments.show', ['comment' => $comment]);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {

          $comment = Comment::find($id);
          $comment-> username = $request -> username;
          $comment-> comment = $request-> comment;
          $comment-> post_id = $request-> post_id;
          $comment-> approved = true;

          if($comment->save()){
            Session::flash('success', 'Comment was approved successfully!');
          }else{
              Session::flash('flash_message', 'Approval failed!');
          }
            return back();

        }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->foreign('post_id')
          ->references('id')->on('posts')
          ->onDelete('cascade');
        $comment -> delete();
    }
}
