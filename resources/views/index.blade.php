@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-header">{{ __('Your Tasks') }} <a href="{{ route('task.create')}}">( +)</a>
        </div>

        <div class="card-body">
          <ul>
            @foreach($tasks as $task)
            <li>
              <form action="{{ route('task.iscomplete')}}" method="POST">
                @csrf

                <input type="checkbox" name="task" onClick="this.form.submit()" {{ $task->iscomplete ? 'checked' :''}}>
                {{ $task->task_name}}

                <input type="hidden" name="id" value="{{  $task->id }}">
              </form>

              <form action="{{ route('task.destroy',$task->id) }}" method="POST">
                @csrf

                @method('DELETE')

                <span><button type="submit" class="btn-link">delete</button></span>
              </form>

            </li>
            @endforeach
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection