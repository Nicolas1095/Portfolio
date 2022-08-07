<?php

namespace App\Http\Controllers;

use App\Models\SkillType;
use Illuminate\Http\Request;

class SkillsTypes extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'skill_type' => 'required | string',
        ]);

        $skill_type = new SkillType();
        $skill_type->type = $request->skill_type;

        if ($skill_type->save()) {
            return redirect()->back()->with("message","El elemento se creo con exito");
        }
    }
}
