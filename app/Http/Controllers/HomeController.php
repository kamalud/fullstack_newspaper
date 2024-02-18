<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function login()
    {
        return view('home');
    }

    public function getPOstInfo(){
        return Post::latest('status',1)
        ->with('category')
        ->get();
    }
    public function postDetailsInfo($slug){

        $post = Post::where('slug',$slug)->first();

        return response()->json(['post'=>$post],200);
        
    }

    public function categoryPOstinfo($slug){

        $category_post = Post::where('category_id',$slug)->orderBy('id',desc)->get();

        return response()->json(['category_post'=>$category_post],200);

    }

  
}