<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('category.blogs.index', ['blogs' => $blogs]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.blogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'description' => ['required', 'min:5'],
            'image' => ['image', 'required'],
        ]);

        $image_path = $request->file('image')->store('blogs');

        Blog::create([
            'user_id'=>Auth::user()->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'image'=>$image_path
        ]);

        return to_route('admin.blog.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        return view('category.blogs.edit', ['blog' => $blog]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        if($request->hasFile('image')){
            Storage::delete($blog->image);
            $blog->image = $request->file('image')->store('blogs');
        }
        $blog->update($request->validated() + [
            'image' => $blog->image
        ]);
        return to_route('admin.blog.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Storage::delete($blog->image);
        $blog->delete();

        return to_route('admin.blog.index');
    }
}