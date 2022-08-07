<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Proyect;

class ProyectsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'img_proyect' => 'required',
            'name_proyect' => 'required | unique:proyects,name',
            'link' => 'required | unique:proyects,link',
            'github' => 'required | unique:proyects,github',
        ]);

        $img = $request->file("img_proyect");
        $imgName = $request->name_proyect.'.'.$request->file("img_proyect")->getClientOriginalExtension();
        $path = "img".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."proyects".DIRECTORY_SEPARATOR;

        $request->file("img_proyect")->storeAs("public".DIRECTORY_SEPARATOR.$path,$imgName);

        $proyect = new Proyect();
        $proyect->name = $request->name_proyect;
        $proyect->link = $request->link;
        $proyect->github = $request->github;
        $proyect->img = $path.$imgName;

        if ($proyect->save()) {
            return redirect()->back()->with("message","El certificado se creo con exito");
        }
    }
    public function delete(Request $request){
        $proyect = Proyect::where('id', $request->id)->first();
        File::delete(public_path("storage".DIRECTORY_SEPARATOR.$proyect->img));
        $proyect->delete();
        return back();
    }
}
