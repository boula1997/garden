<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Models\Gallery;
use App\Models\Image;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolios = Gallery::latest()->get();
        return view('admin.crud.portfolios.Index', compact('portfolios'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        $request->validate([
            'title' => 'required',
            'images.*' => 'required',
         ],['title.required'=>'حقل الاسم مطلوب',
         'images.*.required'=>'حقل الصورة مطلوب',]);

         $portfolio=Gallery::create($request->all());
        //  dd($portfolio);
        if($request->hasFile('images')!==null){

            $files=$request->file('images');
            foreach($files as $file){
                $data['image']=$file->store('images');
                $file->move('public/images',$data['image']);
                Image::create(['image'=>$data['image'],'gallery_id'=>$portfolio->id]);
            }

         }

        return redirect()->route('portfolios.index')
            ->with('success', 'تم الانشاء');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $portfolio)
    {
        $images=Image::where('gallery_id',$portfolio->id)->get();
        return view('admin.crud.portfolios.show', compact('portfolio','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $portfolio)
    {
    //    dd($portfolio->title);
        $images=Image::where('gallery_id',$portfolio->id)->get();
        return view('admin.crud.portfolios.edit', compact('portfolio','images'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $portfolio)
    {
        $request->validate([
            'title' => 'required',
            
         ],['title.required'=>'حقل الاسم مطلوب',
         ]);

         
         if($request->hasFile('images')){

            $files=$request->file('images');
            foreach($files as $file){
                $data['image']=$file->store('images');
                $file->move('public/images',$data['image']);
                Image::create(['image'=>$data['image'],'gallery_id'=>$portfolio->id]);
            }

         }
         if($request->has('delimages')){

            $delimages=$request->input('delimages');
            foreach($delimages as $delimage){
                File::delete('public/'.Image::where('id',$delimage));
                Image::where('id',$delimage)->delete();
            }
         }

        return redirect()->route('portfolios.edit',compact('portfolio'))
            ->with('success', 'تم التعديل بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gallery  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $portfolio)
    {
        $portfolio->delete();

        return redirect()->route('portfolios.index')
            ->with('success', 'تم الحذف');
    }
}
