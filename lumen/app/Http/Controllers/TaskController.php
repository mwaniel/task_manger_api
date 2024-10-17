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
}
