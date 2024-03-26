<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //
    public function store(){

        request()->validate([
            'idea'=> 'required|min:5|max:256'
        ]);

         $idea= Idea::create([
            'content'=>request()->get('idea',null),

        ]);

         return redirect()->route('dashbord')->with('success','idea created successfully');
    }
    public function destroy(Idea $id){
        $id->delete();

        return redirect()->route('dashbord')->with('success','idea deleted successfully');
    }
    public function show(Idea $id){

        return view('ideas.show',[
            'idea'=>$id
        ]);
    }
}
