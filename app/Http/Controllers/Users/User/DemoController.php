<?php

namespace App\Http\Controllers\Users\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactMail;

use Auth;

//use App\Models\Demo
use App\Models\{
  Demo,
  
};

class DemoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
public function demo()
    {
        return view('user.demo');
    }
    
    public function guzzleGet()
{
    $client = new \GuzzleHttp\Client();
    $request = $client->get('https://api.blockchain.com/v3/exchange/l3/BTC-USD');
    $response = $request->price();
   
    dd($response);
}

public function guzzlePost()
{
    $client = new \GuzzleHttp\Client();
    $url = "http://testmyapi.com/api/blog";

    $myBody['name'] = "Demo";
    $request = $client->post($url,  ['body'=>$myBody]);
    $response = $request->send();
    
    dd($response);
}
    
    
    public function store(Request $request)
    {
        dd($request);
    }

    public function show(Post $post)
    {
        if(Auth::guest())
        {
            $categories = Category::all();
            $comments = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();

            return view('user.post.show', compact('post', 'comments', 'categories'));
        }

        $user_id = auth()->user()->id;
        //check sub saus if acive
        $subscription = Subscription::whereUserId($user_id)->whereSubStatus(1)->first();
        if($subscription){
            if (SubDetail::whereSubscriptionId($subscription->id)->wherePostId($post->id)->whereTask('read')->exists())
            {
                
                $categories = Category::all();
                $comments = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();

                return view('user.post.show', compact('post', 'comments', 'categories'));
            }
        } else {

            $setting = Setting::whereId(1)->first();
                SubDetail::create([
                    'subscription_id' => $subscription->id,
                    'post_id' => $post->id,
                    'point' => $setting->read_points,
                    'task' => 'read'
                ]);
                $categories = Category::all();
                $comments = Comment::where('post_id', $post->id)->orderBy('id', 'desc')->get();
    
                return view('user.post.show', compact('post', 'comments', 'categories'));
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

    public function search(Request $request)
    {
        $categories = Category::all();
        $query = $request('query');
        $result = Post::where('post_title', 'LIKE', '%'.$query.'%')->orWhere('post_body', 'LIKE', '%'.$query.'%')->paginate(10);
        return view('user.search.index', compact('result', 'categories', 'query'));
    }

    

}
