@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">{{ __('Edit Task') }}
                    <a title="back to home" class="w-25 text-decoration-none text-bg-primary text-white p-2"
                       style="border-radius: 10px;margin-left:75%" href="{{ route('todo.index') }}">Back</a>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('todo.update',$task->id) }}">
                        @csrf
                        @method('put')
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name='title' value="{{ $task->title }}" class="form-control" id="exampleInputEmail1">
                        </div>
                        @error('title')
                        <p style="color:red">*{{ $message }}</p>
                        @enderror

                        <div class="form-group mt-3 mb-2">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea name="description" class="form-control" id="exampleInputPassword1" cols="30" rows="5">
                                {{ $task->description }}
                            </textarea>
                        </div>
                        @error('description')
                        <p style="color:red">*{{ $message }}</p>
                        @enderror

                        <div class="form-group mt-3 mb-2">
                            <label for="exampleInputPassword1">Completed</label>
                            <select class="form-control" name="complete" id="exampleInputPassword1">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>
                        @error('description')
                        <p style="color:red">*{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-primary mt-1">update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
