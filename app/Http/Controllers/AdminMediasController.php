<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediasController extends Controller
{
    public function index(){
        $photos = Photo::all();
        return view('admin.medias.index',compact('photos'));
    }

    public function create(){
        return view('admin.medias.create');
    }

    public function store(Reuqest $request){
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images',$name);
        return $name;
    }

    public function destroy($id){
        $photo = Photo::findOrFail($id);
        unlink(public_path() . '/images/' . $photo->file);
        $photo->delete();
        return redirect('/admin/medias');
    }
}
