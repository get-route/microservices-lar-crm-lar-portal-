<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use http\Env\Response;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $post_all = Post::all();
      return view('post', compact('post_all'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $post_created = Post::create($request->only('title','descriptions','url','images'));
        return response($post_created, 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Post::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post_once = Post::find($id);
        $post_once->update($request->only('title','descriptions','url','images'));
        return response($post_once, "HTTP_ACCEPTED");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::destroy($id);
        return response(null,404);
    }
}
