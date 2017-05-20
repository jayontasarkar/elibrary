<?php

namespace App\Http\Controllers;

use App\Gallery;
use App\Services\UploadService;
use Illuminate\Http\Request;

class GalleriesController extends Controller
{
    private $service;

    public function __construct(UploadService $service)
   {
        $this->service = $service;
        $this->middleware(['auth', 'librarian']);
   }   
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galleries = Gallery::latest()->take(16)->get();

        return view('librarian.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'required|image|mimes:jpg,jpeg,png'
        ]);
        $path = $this->service->upload($request->file('file'), 'gallery');
        Gallery::create([
            'path' => $path
        ]);
        return response()->json(['success' => 'File uploaded successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gallery $gallery)
    {
        $this->service->delete('gallery/' . $gallery->path);
        $gallery->delete();
        flash()->success('Deleted', 'Gallery image deleted successfully');
        return back();
    }
}
