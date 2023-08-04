<?php

namespace App\Http\Controllers;

use App\Models\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ApiPhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Photos::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // foreach ($request->filename as $key=>$photos){
logger($request->filename);
           $srno=1;
           $photos = new Photos();
        //    $imageName = Carbon::now()->timestamp .'-'.$srno.'.' . $request->filename->name;
           $request->file('image')->storeAs('/upload_img/photos', $request->filename);
           $photos->filename=$request->filename;
           $photos->status=$request->status;
           $photos->sr=$srno;
           $photos->folder_id='1';
           $photos->user_id='1';
           $photos->title=$request->title;
           $photos->save();


    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // return $photos;

       $photos=Photos::where('id',$id)->get();
       return $photos;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photos $photos)
    {
        return $photos;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Photos $photos)
    {

        $photos->update($request->all());

        return $photos;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $photos = Photos::find($id);
        $photos->delete();


    }
}
