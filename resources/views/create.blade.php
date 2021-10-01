@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">{{ __('Create Tasks') }} 
                </div>

                <div class="card-body">
              
                    <form method="post" action="{{ route('task.store')}}">
                    @csrf
                        @if($errors)
                            @foreach ($errors->all() as $error)
                                <p class="error">{{ $error}}</p>
                            @endforeach
                        @endif
                        <input type="text" name="task_name">
                        <input type="submit" value="Create">
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
