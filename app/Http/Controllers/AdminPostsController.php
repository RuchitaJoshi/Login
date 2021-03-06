<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;
use App\Photo;

class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(2);
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if($file = $request->file('photo_id')){
            //return "It Works";
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $input['user_id'] = $user->id;
        $user->post()->create($input);
        return redirect('admin/posts');
//        return $request->all();
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
        $post = Post::findOrFail($id);
        $category = Category::pluck('name','id')->all();
        return view('admin.posts.edit',compact('post','category'));
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
        $input = $request->all();
        $user = Auth::user();

        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        //Auth::user()->post()->whereId($id)->first()->update($input);
        $input['user_id'] = $user->id;
        $user->post()->where(['id'=>$id])->first()->update($input);
        return redirect('admin/posts');
        //return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        //dd($id);
        $post = Post::findOrFail($id);

        unlink(public_path(). '/images/' . $post->photo->file);

        $post->delete();
        return redirect('admin/posts');
    }

    public function post($id){

        $post = Post::findOrFail($id);
        $comments = $post->comments()->whereIsActive(1)->get();
        return view('post',compact('post','comments'));
    }
}
