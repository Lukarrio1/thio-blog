<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\posts;
use Illuminate\Support\Facades\Auth;
class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = posts::where('user_id', Auth::user()->id)->get();
        return view('blog.index')->with('all',$all);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|min:3',
            'body'=>'required|min:3'
        ]);
        $post = new posts;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id=Auth::user()->id;
        $post->save();
        return redirect("/blog");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post= posts::find($id);
        return view("blog.show")->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = posts::find($id);
        return view("blog.edit")->with('edit',$edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title'=>'required|min:3',
            'body'=>'required|min:3'
        ]);
        $post = posts::find($id);
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return redirect("/blog/".$id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = posts::find($id);
        $del->delete();
        return redirect('/blog');
    }
}
