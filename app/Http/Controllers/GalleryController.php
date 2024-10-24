<?php

namespace App\Http\Controllers;

use App\Models\gallery;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoregalleryRequest;
use App\Http\Requests\UpdategalleryRequest;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_fr()
    {   
         $gallery = DB::table('galleries') -> get();
        // mengirim data blog ke view 
        return view('frontend.gallery', ['gallery' => $gallery
           ]);
    }
    public function index()
    {
         $gallery = DB::table('galleries') -> get();
        // mengirim data blog ke view 
        return view('admin.galleries.gallery', ['gallery' => $gallery]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.galleries.gallery-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoregalleryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoregalleryRequest $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
    
        $input = $request->all();
    
        if ($image = $request->file('image')) {
            // Store the image in the 'public/images' folder
            $path = $image->store('images', 'public');
            $input['image'] = $path; // Store the image path in the database
        }
    
        Gallery::create($input);
    
        return redirect('/admin/galleries/gallery');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(gallery $gallery,$id)
    {
         $gallery = DB::table('galleries')->where('id', $id)->first();
        return view('admin.galleries.gallery-edit', compact('gallery'));   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdategalleryRequest  $request
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(UpdategalleryRequest $request, gallery $gallery)
{
    $request->validate([
        'name' => 'required',
        'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);

    $input = $request->all();

    if ($image = $request->file('image')) {
        // Store the image in the 'public/images' folder
        $path = $image->store('images', 'public');
        $input['image'] = $path; // Update the image path in the database
    } else {
        unset($input['image']);
    }

    $gallery->update($input);

    return redirect('/admin/galleries/gallery');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(gallery $gallery,$id)
    {
        DB::table('galleries')->where('id', $id)->delete();
        return redirect('/admin/galleries/gallery');
    }
}