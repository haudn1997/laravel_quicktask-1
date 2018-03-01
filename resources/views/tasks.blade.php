
@extends('layouts.app')
@section('content')
    <div>
        @include('common.errors')
        {{ Form::open(['route' => 'task.store'])}}
            <table>
                <tr>
                    <td> {{ trans('message.Task') }} </td>
                    <td> {{ Form::text('name') }} </td>
                </tr>
                <tr>
                    <td> {{ Form::submit(trans('message.Add')) }} </td>
                </tr>
            </table>
        </div>      
        {{ Form::close() }}   
    <div>
            <div> {{ trans('message.Current_Tasks')}} </div>
            <div> {{ trans('message.Task') }} </div>
            @foreach ($tasks as $task)                    
                {{ Form::open(['method' => 'DELETE', 'route'=>['task.destroy',$task->id]]) }}
                    <tr>
                        <td> {{ $task->name }} </td>
                        <td> {{ Form::submit(trans('message.delete')) }} </td>
                    </tr>
                {{ Form::close() }}
            @endforeach
    </div>
@endsection
