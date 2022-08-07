<?php

namespace App\Http\Controllers;
use App\Models\Skill;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class SkillsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'img_skill' => 'required',
            'name_skill' => 'required |string',
            'type' => 'required | numeric',
        ]);

        $img = $request->file("img_skill");
        $imgName = $request->name_skill.'.'.$img->getClientOriginalExtension();
        $path = "img".DIRECTORY_SEPARATOR."uploads".DIRECTORY_SEPARATOR."skills".DIRECTORY_SEPARATOR;

        $request->file("img_skill")->storeAs("public".DIRECTORY_SEPARATOR.$path,$imgName);

        $skill = new Skill();
        $skill->name = $request->name_skill;
        $skill->type = $request->type;
        $skill->img = $path.$imgName;

        if ($skill->save()) {
            return redirect()->back()->with("message","El elemento se creo con exito");
        }
    }
    public function delete(Request $request){
        $skill = Skill::where('id', $request->id)->first();
        File::delete(public_path("storage".DIRECTORY_SEPARATOR.$skill->img));
        $skill->delete();
        return back();
    }
}
