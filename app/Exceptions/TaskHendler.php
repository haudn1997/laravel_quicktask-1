<?php

namespace App\Exceptions;
use Exception;

class TaskHendler extends Exception
{
    public function renderCreate($request)
    {
        return view('taskErrors', ['notification' => trans('message.Fails')]);
    } 
    public function renderDelete($request)
    {
        return view('taskErrors', ['notification' => trans('message.delete_fails')]);
    }
}
