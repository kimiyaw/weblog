<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        return view('admin.posts.index',[
           'posts'=>Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('admin.posts.create',[
            'categories'=>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(AddPostRequest $request)
    {
        $image = $request->file('image')->storeAs('public/image/posts',$request->file('image')->getClientOriginalName());

        Post::query()->create([
            'title'=>$request->get('title'),
            'category_id'=>$request->get('category_id'),
            'body'=>$request->get('body'),
            'slug'=>$request->get('slug'),
            'image'=>$image,
        ]);
        return redirect('/adminpanel/posts');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Post $post)
    {
        return view('master',[
            'posts'=>Post::all(),
            'categories'=>Category::all()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit',[
            'post'=>$post,
            'categories'=>Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $slugExists=Post::query()
            ->where('slug',$request->get('slug'))
            ->where('id','!=',$post->id)->exists();
        if ($slugExists){
            return back()->withErrors(['slug'=>'the slug has been taken']);
        }

        if ($request->hasFile('image')){
            $image = $request->file('image')->storeAs('public/image/posts',$request->file('image')->getClientOriginalName());
        }
        else{
            $image=$post->image;
        }
        $post->update([
            'title'=>$request->get('title'),
            'category_id'=>$request->get('category_id'),
            'body'=>$request->get('body'),
            'slug'=>$request->get('slug'),
            'image'=>$image,
        ]);
        return redirect('/adminpanel/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy(Post $post)
    {
       $post->delete();
       return redirect('/adminpanel/posts');
    }
}
