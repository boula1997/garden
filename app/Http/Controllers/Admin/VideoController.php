<?php

namespace App\Http\Controllers\Admin;

use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $videos = Video::latest()->get();
        return view('admin.crud.videos.Index', compact('videos'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.videos.create');
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
         'youtube_link' => 'required',
      ],['title.required'=>'حقل الاسم مطلوب',
      'youtube_link.required'=>'حقل الرابط مطلوب',
    ]);
    
        Video::create($request->all());
        return redirect()->route('videos.index')
            ->with('success', 'تم الانشاء');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        return view('admin.crud.videos.show', compact('video'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
    //    dd($video->title);
        return view('admin.crud.videos.edit', compact('video'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portfolio  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([
            'title' => 'required',
            'youtube_link' => 'required',
         ],['title.required'=>'حقل الاسم مطلوب',
         'youtube_link.required'=>'حقل الرابط مطلوب',
       ]);
         
         $data=$request->all();
 
         $video->update($data);
 
 
        return redirect()->route('videos.edit',compact('video'))
            ->with('success', 'تم التعديل بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $video->delete();
 
        return redirect()->route('videos.index')
            ->with('success', 'تم الحذف');
    }
}
