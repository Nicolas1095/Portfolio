<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Certification;
use App\Models\Proyect;
use App\Models\Skill;
use App\Models\SkillType;

class IndexController extends Controller
{
    public function index()
    {
        $certifications = Certification::all();
        $proyects = Proyect::all();
        $skills = Skill::join("skill_types", "skill_types.id", "=", "skills.type")
        ->select("skills.*", "skill_types.type")->get();
        $skills_types = SkillType::all();
        return view("index")->with(["certifications" => $certifications, "proyects" => $proyects, "skills_types" => $skills_types])->with("skills", $skills);
    }
}
