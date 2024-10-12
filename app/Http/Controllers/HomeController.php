<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Models\Post;


class ProfileController extends Controller
{
    public function showProfile()
    {
        // جلب جميع المنشورات مع معلومات المستخدم والتعليقات
        $posts = Post::with('user', 'comments')->get(); // هنا يتم تعريف $posts

        // تمرير المنشورات إلى الواجهة
        return view('My Profile', ['posts' => $posts]);
    }
}

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
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home');
    }


}





