<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    //
    public function store(){

        $validated= request()->validate([
            'content'=> 'required|min:5|max:256'
        ]);

        $validated['user_id']= auth()->id();
        Idea::create($validated);

         return redirect()->route('dashbord')->with('success','idea created successfully');
    }
    public function destroy(Idea $id){

        if(auth()->id() !== $id->user_id){
            abort(404);
        }

        $id->delete();

        return redirect()->route('dashbord')->with('success','idea deleted successfully');
    }
    public function show(Idea $id){

        return view('ideas.show',[
            'idea'=>$id
        ]);
    }
    public function edit(Idea $id){

        if(auth()->id() !== $id->user_id){
            abort(404);
        }

        $editing= true;
        return view('ideas.show',[
            'idea'=>$id,
            'editing' => $editing
        ]);
    }
    public function update(Idea $id){

        if(auth()->id() !== $id->user_id){
            abort(404);
        }

        request()->validate([
            'content'=> 'required|min:5|max:256'
        ]);

        $id->content=request()->get('content','');
        $id->save();

        return redirect()->route('idea.show',$id->id)->with('success','idea updated successfully !');
    }
}
