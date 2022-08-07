<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\Certification;


class CerticationsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'img_certification' => 'required',
            'name_certification' => 'required | unique:certifications,name',
            'granted_by' => 'required',
        ]);

        $img = $request->file("img_certification");
        $imgName = $request->name_certification.'.'.$request->file("img_certification")->getClientOriginalExtension();
        $path = "img".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."certifications".DIRECTORY_SEPARATOR;

        $request->file("img_certification")->storeAs("public".DIRECTORY_SEPARATOR.$path,$imgName);

        $certification = new Certification();
        $certification->name = $request->name_certification;
        $certification->granted_by = $request->granted_by;
        $certification->img = $path.$imgName;

        if ($certification->save()) {
            return redirect()->back()->with("message","El certificado se creo con exito");
        }
    }
    public function delete(Request $request){
        $certification = Certification::where('id', $request->id)->first();
        File::delete(public_path("storage".DIRECTORY_SEPARATOR.$certification->img));
        $certification->delete();
        return back();
    }
}
