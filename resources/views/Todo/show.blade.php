@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">{{ __('Show Task') }}
                        <a title="back to home" class="w-25 text-decoration-none text-bg-primary text-white p-2"
                           style="border-radius: 10px;margin-left:75%" href="{{ route('todo.index') }}">Back</a>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name='title' value="{{ $task->title }}" class="form-control"
                                   id="exampleInputEmail1">
                        </div>


                        <div class="form-group mt-3 mb-2">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea name="description" value="{{ $task->description }}" class="form-control"
                                      id="exampleInputPassword1" cols="30" rows="5"></textarea>
                        </div>

                        <div class="form-group mt-3 mb-2">
                            <label for="exampleInputPassword1">Created at</label>
                            <input name="description" value="{{ $task->created_at }}" class="form-control"
                                   id="exampleInputPassword1">
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
