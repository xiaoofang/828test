<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class OrmController extends Controller
{
    public function create()
    {
        Post::create([
            'title' => 'Post title',
            'content' => 'Post content',
            'name'=>'Poster',
            'note'=>'123456'
        ]);

    }
}
