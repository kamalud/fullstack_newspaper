<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Post;
use Auth;
use Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        return response()->json(["posts"=>$posts ],200);        
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
        $this->validate($request,[
            'title'=>'required',
            'category_id'=>'required',
            'description'=>'required',
            'status'=>'required',
            'image'=>'required',
        ]);

        $file = explode(';',$request->image);
        $file = explode('/',$file[0]);
        $file_ex = end($file);
        $slug = Str::slug($request->title);
        $file_name = $slug . '.'.$file_ex;


        $post = new Post();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->description = $request->description;
        $post->keyword = $request->keyword;
        $post->view_count = $request->view_count;
        $post->like = $request->like;
        $post->dislike = $request->dislike;
        $post->status = $request->status;
        $post->image = $file_name;
        
        if($post->save()){
            Image::make($request->image)->resize(400,200)->save(public_path('upload/posts/'). $file_name);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $post = Post::where('slug',$slug)->first();
        return response()->json(['post'=>$post],200);
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
    public function update(Request $request)
    {

        
        $post = Post::find($request->id);

        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->category_id = $request->category_id;
        $post->user_id = Auth::user()->id;
        $post->description = $request->description;
        $post->keyword = $request->keyword;
        $post->view_count = $request->view_count;
        $post->like = $request->like;
        $post->dislike = $request->dislike;
        $post->status = $request->status;
        $post->image = $file_name;

        if($request->image !== $post->image){
            
        $file = explode(';',$request->image);
        $file = explode('/',$file[0]);
        $file_ex = end($file);
        $slug = Str::slug($request->title);
        $file_name = $slug . '.'.$file_ex;
        $post->image = $file_name;

        Image::make($request->image)->resize(400,200)->save(public_path('upload/posts/'). $file_name);
        }
        
        $post->save() ;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $post = Post::where('slug',$slug)->first();
         $file_name = $post->image;
         if(file_exists(public_path('upload/posts/'.$file_name))){
            unlink(public_path('upload/posts/'.$file_name));
         };
        $post->delete();
    }
}
