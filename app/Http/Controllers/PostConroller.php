<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\User;
use Illuminate\Http\Request;

class PostConroller extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){

    $data = request()->validate([
    'caption'=> 'required',
    'image'=>'required|image'
]);

$imagePath= request('image')->store('uploads','public');

auth()->user()->posts()->create([
    'caption'=>$data['caption'],
    'image'=>$imagePath
]);

      return redirect('/profile/' . auth()->user()->id);




    }
    public function show(post $post){
return view('posts.show', compact('post'));
    }
}
