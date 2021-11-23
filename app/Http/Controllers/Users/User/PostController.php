<?php

namespace App\Http\Controllers\Users\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;

use Auth;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Subscription;
use App\Models\SubDetail;
use App\Models\Setting;
use Validator;
use Redirect;
use Response;

/*use App\Models{
  Post,
  Ccomment,
  Subscription,
  SubDetail,
  Setting,
  
}*/

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['welcome', 'index', 'show', 'search', 'category', 'getArticles']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
     
    public function welcome()
    {
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(5);
        
        return view('welcome', compact('posts'));
    }
    
    public function index()
    {
        $categories = Category::all();
        $posts = Post::orderBy('created_at', 'desc')->simplePaginate(10);
        $post_slides = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('user.post.index', compact('posts', 'categories', 'post_slides'));
    }
    
    public function getArticles(Request $request)
    {
        $results = Post::orderBy('id')->paginate(10);
        $articles = '';
        if ($request->ajax()) {
            foreach ($results as $result) {
                $articles.='<div class="card mb-2"> <div class="card-body">'.$result->id.' <h5 class="card-title">'.$result->post_title.'</h5> '.$result->post_body.'</div></div>';
            }
            return $articles;
        }
        return view('test_welcome');
    }    


    public function show(Post $post)
    {
        if(Auth::guest())
        {
            $categories = Category::all();
            $related_posts = Post::where('id', '<>', $post->id)->whereCategoryId($post->category_id)->orderBy('id', 'desc')->take(3)->get();
            $comments = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();

            return view('user.post.show', compact('post', 'comments', 'categories', 'related_posts'));
        }

        $user_id = auth()->user()->id;
        //check sub saus if acive
        $subscription = Subscription::whereUserId($user_id)->whereSubStatus(1)->first();
        if($subscription){
            if (SubDetail::whereSubscriptionId($subscription->id)->wherePostId($post->id)->whereTask('read')->exists())
            {
                
                $categories = Category::all();
                $related_posts = Post::where('id', '<>', $post->id)->whereCategoryId($post->category_id)->orderBy('id', 'desc')->take(3)->get();
                $comments = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();

                return view('user.post.show', compact('post', 'comments', 'categories', 'related_posts'));
            }else {

                $setting = Setting::whereId(1)->first();
                    SubDetail::create([
                        'user_id' => auth()->user()->id,
                        'subscription_id' => $subscription->id,
                        'post_id' => $post->id,
                        'point' => $setting->read_points,
                        'task' => 'read'
                    ]);
                    $categories = Category::all();
                    $related_posts = Post::where('id', '<>', $post->id)->whereCategoryId($post->category_id)->orderBy('id', 'desc')->take(3)->get();
                    $comments = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();
        
                    return view('user.post.show', compact('post', 'comments', 'categories', 'related_posts'));
            }
        } else {
            $categories = Category::all();
            $related_posts = Post::where('id', '<>', $post->id)->whereCategoryId($post->category_id)->orderBy('id', 'desc')->take(3)->get();
            $comments = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();

            return view('user.post.show', compact('post', 'comments', 'categories', 'related_posts'));
        }

        
    }

    public function saveComment(Request $request)
    {
        $data = request()->validate([
            'post_id' => ['required', 'string'],
            'comment_text' => ['required'],
        ]); 

        $slug = $slug.'-'.time();

        $Comment = Comment::create([
            'post_id' => $data['post_id'],
            'user_id' => auth()->user()->id,
            'comment_status' => 1,
            'comment_text' => $data['comment_text'],
            'comment_slug' => $slug,
        ]); 

        return redirect()->back()->with('success', 'Comment Posted');
    }

    public function searchvuh(Request $request)
    {
        $categories = Category::all();
        $query = $request('query');
        $result = Post::where('post_title', 'LIKE', '%'.$query.'%')->orWhere('post_body', 'LIKE', '%'.$query.'%')->paginate(10);
        return view('user.search.index', compact('result', 'categories', 'query'));
    }
    
    public function search(Request $request){
    // Get the search value from the request
    $search = $request->search_query;

    // Search in the title and body columns from the posts table
    $posts = Post::query()
        ->where('post_title', 'LIKE', "%{$search}%")
        ->orWhere('post_body', 'LIKE', "%{$search}%")
        ->get();

    // Return the search view with the resluts compacted
    return view('user.search.index', compact('posts', 'search'));
}

    

}
