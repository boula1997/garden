<?php

namespace App\Http\Controllers\Admin;

use App\Models\Counter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CounterController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $counters = Counter::latest()->get();
        return view('admin.crud.counters.Index', compact('counters'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.crud.counters.create');
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
         'count' => 'required',
      ],['title.required'=>'حقل الاسم مطلوب',
      'count.required'=>'حقل العدد مطلوب',
    ]);
    
    
        Counter::create($request->all());
        return redirect()->route('counters.index')
            ->with('success', 'تم الانشاء');
    }
 
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function show(Counter $counter)
    {
        return view('admin.crud.counters.show', compact('counter'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function edit(Counter $counter)
    {
    //    dd($counter->title);
        return view('admin.crud.counters.edit', compact('counter'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\portfolio  $counter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Counter $counter)
    {
        $request->validate([
            'title' => 'required',
            'count' => 'required',
         ],['title.required'=>'حقل الاسم مطلوب',
         'count.required'=>'حقل العدد مطلوب',
       ]);
         
         $data=$request->all();
 
         $counter->update($data);
 
 
        return redirect()->route('counters.edit',compact('counter'))
            ->with('success', 'تم التعديل بنجاح');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Counter  $counter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Counter $counter)
    {
        $counter->delete();
 
        return redirect()->route('counters.index')
            ->with('success', 'تم الحذف');
    }
}
