<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
  /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('admin.crud.blogs.Index', compact('blogs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.blogs.create');
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        // dd($request->all());
        $request->validate([
         'title' => 'required',
         'image' => 'required',
         'description' => 'required',
      ],['title.required'=>'حقل الاسم مطلوب',
      'image.required'=>'حقل الصورة مطلوب',
      'description.required'=>'حقل الوصف مطلوب',
    ]);
 
    $data=$request->all();
    $file = $request->file('image');
    $data['image']=$request->image->store('images');
    $file->move('public/images',$data['image']);
        Blog::create($data);
        return redirect()->route('blogs.index')
            ->with('success', 'تم الانشاء');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.crud.blogs.show', compact('blog'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
    //    dd($blog->title);
        return view('admin.crud.blogs.edit', compact('blog'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portfolio  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required',
         ],['title.required'=>'حقل الاسم مطلوب',
         'description.required'=>'حقل الوصف مطلوب',]);
         
         $data=$request->all();
 
         if($request->hasFile('image')){
            if(file_exists('public/'.$blog->image))
            File::delete('public/'.$blog->image);
            $file = $request->file('image');
            $data['image']=$request->image->store('images');
            $file->move('public/images',$data['image']);

         }
 
         else
        { $data['image']=$blog->image;}
 
         $blog->update($data);
 
 
        return redirect()->route('blogs.edit',compact('blog'))
            ->with('success', 'تم التعديل بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        File::delete('public/'.$blog->image);
        $blog->delete();
        return redirect()->route('blogs.index')
            ->with('success', 'تم الحذف');
    }
}
