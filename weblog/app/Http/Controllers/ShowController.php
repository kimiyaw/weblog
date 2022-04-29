<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(Post $post)
    {
        return view('client.showpost',[
           'post'=>$post,
            'posts'=>Post::all()
        ]);

    }
}
