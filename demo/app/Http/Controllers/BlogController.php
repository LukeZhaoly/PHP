<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //访问主页
    public function index(){
        //从数据库中查找数据，根据config的设置每页的分页数
        $posts=Post::where("published_at","<=",Carbon::now())
            ->orderBy('published_at','desc')
            ->paginate(config('blog.posts_per_page'));
        return view("blog.index")->with('posts',$posts);
    }

    //访问具体的文章
    public function showPost($slug){
        $post=Post::where('slug',$slug)->firstOrFail();
        return view('blog.post')->with('post',$post);
    }
}
