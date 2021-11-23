<?php

namespace App\Http\Controllers\Users\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;

use Auth;

use App\Models\{
  Post,
  Category
  
};

class CategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome', 'index', 'show', 'search', 'category']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
    public function welcome()
    {
        $posts = Post::orderBy('created_at', 'desc')->paginate(5);
        
        return view('welcome', compact('posts'));
    }
    
    public function index()
    {
        $categories = Category::orderBy('created_at', 'desc')->get();
        
        return view('user.category.index', compact('categories'));
    }

    public function show(Category $category)
    {
      $posts = Post::whereCategoryId($category->id)->orderBy('created_at', 'desc')->get();
      return view('user.category.show', compact('posts', 'category'));
    }
}
