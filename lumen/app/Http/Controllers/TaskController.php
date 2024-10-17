<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Validator;


class TaskController extends Controller
{
   // create Task
   public function createTask(Request $request)
   {
        $validator = Validator::make($request->all(),[
            'title'=>'required|unique:tasks',
            'due_date'=> 'required|date|after:today'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(),400);
        }
        $task = Task::create($request->all());
        return response()->json(['message'=>'Task created successfully'],201);
   }
   // get all tasks
   public function getAllTasks(Request $request)
   {
    $tasks = Task::query();
    //filter by status
    if($request->has('status')){
        $tasks->where('status',$request->status);
    }
    //filter by due date
    if($request->has('due_date')){
        $tasks->where('due_date',$request->status);
    }

    //search by title
    if($request->has('search')){
        $tasks->where('title','like','%'.$request->search. '%');
    }

//page
    return response()->json($tasks->paginate(10));

   }

   //get a task
   public function getTask($id)
   {
    $task = Task::find($id);
    if (!$task){
        return response()->json(['message'=>'Task not found'],404);
    }
    return response()->json($task);
   }
   //update a task
   public function updateTask(Request $request,$id)
   {
    $task = Task::find($id);
    if (!$task){
        return response()->json(['message'=>'Task not found'],404);
    }
    $validator = Validator::make($request->all(),[
        'title'=>'required|unique:tasks',
        'due_date'=> 'required|date|after:today'
    ]);
    if ($validator->fails()){
        return response()->json($validator->errors(),400);
    }
    $task->update($request->all());
    return response()->json(['message'=>'Task updated successfully'],200);
   }

   //delete
   public function deleteTask($id)
   {
    $task = Task::find($id);
    if (!$task){
        return response()->json(['message'=>'Task not found'],404);
    }
    $task->delete();
    return response()->json(['message'=>'Task deleted successfully'],200);
   }
}
