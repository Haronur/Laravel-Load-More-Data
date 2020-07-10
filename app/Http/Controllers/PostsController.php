<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostsController extends Controller
{
 public function vue_index(){
  $PostData = Post::orderBy('created_at', 'desc')->paginate(10);
  return response()->json($PostData, 200);
}
public function vueindex(){
  return view('vue_load');
}
}
  