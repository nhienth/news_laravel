<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCate = Category::all()->sortDesc(); 
        $postTrendingTop = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_views', 'desc')
            ->take(3)
            ->get();

        $postTrendingTopRight = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_id', 'desc')
            ->take(2)
            ->get();

        $postMostRecentDetails = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_id', 'desc')
            ->first();

        $postMostRecentSingle = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_id', 'desc')
            ->take(2)
            ->get();

        $postMostPopular = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_views', 'desc')
            ->take(6)
            ->get();
        

        return view('index', compact(['allCate', 'postTrendingTop', 'postTrendingTopRight', 'postMostRecentDetails', 'postMostRecentSingle', 'postMostPopular'])); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $kyw = $request->keyword;
        $allCate = Category::with('posts')
            ->orderBy('category_id', 'desc')
            ->get(); 
        $postTrendingTop = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_views', 'desc')
            ->take(3)
            ->get();
        $recentPosts = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_id', 'desc')
            ->take(5)
            ->get();
        $allPost = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->where('news.news_title', 'LIKE', '%'.$kyw.'%')
            ->orWhere('news.news_summary', 'LIKE', '%'.$kyw.'%')
            ->orderBy('news.news_id', 'desc')
            ->get();

        $message = count($allPost) == 0 ? "Kh??ng c?? k???t qu??? t??m ki???m ph?? h???p" : "";


        return view('postsByCate', compact(['allPost', 'message','allCate', 'postTrendingTop', 'recentPosts']));
    }

    public function getAllByCateId($id) {
        $allCate = Category::with('posts')
            ->orderBy('category_id', 'desc')
            ->get(); 
        $postTrendingTop = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_views', 'desc')
            ->take(3)
            ->get();
        $allPost = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->where('news.category_id', $id)
            ->orderBy('news.news_id', 'desc')
            ->get();
        
        $recentPosts = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_id', 'desc')
            ->take(5)
            ->get();

        return view('postsByCate', compact(['allPost', 'allCate', 'postTrendingTop', 'recentPosts']));
    }

    public function details($id) {
        $post = Post::with(['user', 'category'])
        ->where('news.news_id', $id)->first();

        $news_views = $post->news_views;
        $post->news_views = $news_views + 1;
        $post->save();

        $allCate = Category::with('posts')
            ->orderBy('category_id', 'desc')
            ->get(); 

        $postTrendingTop = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_views', 'desc')
            ->take(3)
            ->get();

        $recentPosts = Post::with(['user', 'category'])
            ->where('news.news_status', '1')
            ->orderBy('news.news_id', 'desc')
            ->take(5)
            ->get();

        $allComments = Comment::with(['user', 'post'])
            ->where('comment.news_id', $id)
            ->where('comment.comment_status', '1')
            ->orderBy('comment.comment_date', 'desc')
            ->get();

        return view('details', compact(['post', 'allCate', 'recentPosts', 'postTrendingTop', 'allComments']));
    }

    public function comment() {
        $comment = new Comment;
        $news_id = $_POST['news_id'];
        $comment->comment_content = $_POST['comment_content'];
        $comment->news_id = $news_id;
        $comment->user_id = Auth::user()->user_id;
        $comment->save();
        return redirect('/post/details/'.$news_id);
    }

    
}
