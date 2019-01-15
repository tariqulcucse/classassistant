<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
    	$posts = Post::latest()->get();
    	return view('teacher.home', compact('posts'));
    }
}
