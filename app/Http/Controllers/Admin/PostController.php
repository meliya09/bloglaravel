<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::orderBy('id','desc')->paginate(5);
        return view('admin.post.index', compact('posts')); 
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.post.create', compact('categories'));
    }

    public function store(PostFormRequest $request){
        $validateData = $request->validated();

        $slug_request = Str::slug($validateData['title']);
        $code = random_int(1000,9999);
        $slug = $code.''.$slug_request;

        $post = new Post;
        $post->slug = $slug;
        $post->title = $validateData['title'];
        $post->category_id = $validateData['category_id'];
        $post->author_name = $validateData['author_name'];
        $post->content = $validateData['content'];

        $post->save();
        return redirect('admin/posts')->with('message','Berhasil Menambahkan Post');
    }

    public function edit(Post $post){
        $categories = Category::all();
        return view('admin.post.edit', compact('post','categories'));
    }

    public function update(PostFormRequest $request,$post){
        $validateData = $request->validated();
        $post = Post::findOrFail($post);

        $post->title = $validateData['title'];
        $post->category_id = $validateData['category_id'];
        $post->author_name = $validateData['author_name'];
        $post->content = $validateData['content'];

        $post->update();
        return redirect('admin/posts')->with('message','Berhasil Update Post');
    }

    public function destroy(int $post_id){
        $post = Post::findOrFail($post_id);
        $post->delete();

        return redirect()->back()->with('message','Berhasil Hapus Post');
    }

   
}
