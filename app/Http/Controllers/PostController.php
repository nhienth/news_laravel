<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allPosts =  Post::all();
        $posts = Post::with(['user', 'category'])
            ->orderBy('news.news_id', 'desc')
            ->get();
        return view('admin.post.list', ['allPosts'=>$allPosts, 'posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allCates = Category::all();
        return view('admin.post.create', ['allCates'=>$allCates]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $post = new Post;
        $post->news_title = $_POST['news_title'];
        $post->news_summary = $_POST['news_summary'];
        $imgpath = $_FILES['news_img']['name'];
        $target_dir = "../public/assets_admin/img/";
        $target_file =  $target_dir . basename($imgpath);
        move_uploaded_file($_FILES['news_img']['tmp_name'], $target_file);
        $post->news_img = $imgpath;
        $post->news_content = $_POST['news_content'];
        $post->category_id = $_POST['category_id'];
        $post->news_status = $_POST['news_status'];
        $post->author_id = Auth::user()->user_id;
        $post->save();
        return redirect('/admin/post/list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $allCates = Category::all();
        return view('admin.post.edit', ['post'=>$post, 'allCates'=>$allCates]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->news_title = $_POST['news_title'];
        $post->news_summary = $_POST['news_summary'];
        $news_img = $_FILES['news_img']['name'];
        if($news_img != '') {
            $target_dir = "../public/assets_admin/img/";
            $target_file =  $target_dir . basename($news_img);
            move_uploaded_file($_FILES['news_img']['tmp_name'], $target_file);
            $post->news_img = $news_img;
        }
        $post->news_content = $_POST['news_content'];
        $post->category_id = $_POST['category_id'];
        $post->news_status = $_POST['news_status'];
        $post->save();
        return redirect('/admin/post/list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/admin/post/list');
    }
}
