<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Controllers\Controller;
use App\Http\Resources\PostResource;
use App\Http\Requests\StorepostRequest;
use App\Http\Requests\UpdatepostRequest;
use App\Http\Resources\PostDetailResource;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        //Collection digunakan jika data yang dikirim lebih dari 1 atau bentuknya adalah array
        return PostResource::collection($posts);
    }

    public function show($id){
        $post = Post::with('User:id,username')->findOrFail($id);
        //new PostResource digunakan jika data yang diambil hanya satu atau singular
        return new PostDetailResource($post);
    }

    //Tanpa with
    public function show2($id){
        $post = Post::findOrFail($id);
        //new PostResource digunakan jika data yang diambil hanya satu atau singular
        return new PostDetailResource($post);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorepostRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    // public function show(post $post)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatepostRequest $request, post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(post $post)
    {
        //
    }
}