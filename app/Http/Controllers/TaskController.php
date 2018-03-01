<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\TaskRequest;
use App\Task;
use App\Http\Controllers\Controller;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::orderBy('created_at', 'asc')->get();
        
        return view('tasks', [
            'tasks' => $tasks
        ]);
    }
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TaskRequest $request)
    {
        try
        {
            $task = new Task;
            $task->name = $request->name;
            $task->save();
        } catch(TaskHendler $e) {
           $e->renderCreate();   
        }
        
        return redirect()->route('task.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }
    public function destroy($id)
    {
        try
        {
            $task = Task::findOrFail($id);
            $task->delete();
        } catch(TaskHendler $e) {
            $e->renderDelete();
        }  

        return redirect()->route('task.index');
    }
}
