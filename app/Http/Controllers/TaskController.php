<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    //
        public function task_add(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'nullable|string',
        ]);

        $task= new Task();
        $task->title= $request->title;
        $task->description= $request->description;
        $task->project_id= $request->project_id;
        $task->status= $request->status;
        $task->save();
        Session::flash('success','Информация успешно добавлена. ');
        return redirect()->back();
    }
       public function task_edit(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'nullable|string',
        ]);

        $task=  Task::find( $request->id);
        $task->title= $request->title;
        $task->description= $request->description;
        $task->user_id= Auth::user()->id;
        $task->status= $request->status;
        $task->save();
        Session::flash('success','Информация успешно изменена. ');
        return redirect()->back();
    }
       public function task_delete(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'nullable|string',
        ]);

        $task=  Task::find( $request->id);
        $task->delete();
        Session::flash('success','Информация успешно удалена. ');
        return redirect()->back();
    }
}
