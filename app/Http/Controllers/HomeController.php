<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Content;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $content = Content::with('createdBy')->first();
        $comments = Comment::with('createdBy')->take(3)->get();
        $responses = Comment::with('createdBy')->orderBy('rating','DESC')->take(3)->get();
        return view('student',compact('content','comments','responses'));
    }
}
