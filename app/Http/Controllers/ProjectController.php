<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Session;
use Auth;
class ProjectController extends Controller
{
    //
    public function project_add(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'nullable|string',
        ]);

        $project= new Project();
        $project->title= $request->title;
        $project->description= $request->description;
        $project->user_id= Auth::user()->id;
        $project->status= $request->status;
        $project->save();
        Session::flash('success','Информация успешно добавлена. ');
        return redirect()->back();
    }
       public function project_edit(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'nullable|string',
        ]);

        $project=  Project::find( $request->id);
        $project->title= $request->title;
        $project->description= $request->description;
        $project->user_id= Auth::user()->id;
        $project->status= $request->status;
        $project->save();
        Session::flash('success','Информация успешно изменена. ');
        return redirect()->back();
    }
       public function project_delete($id)
    {
        $project=  Project::find( $id);
        $project->delete();
        Session::flash('success','Информация успешно удалена. ');
        return redirect()->back();
    }
}
