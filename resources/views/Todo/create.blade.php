@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="d-inline-block card-header">{{ __('Add New Task') }}
                    <a title="back to home" class="w-25 text-decoration-none text-bg-primary text-white p-2"
                       style="border-radius: 10px;margin-left:70%" href="{{ route('todo.index') }}">Back</a>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('todo.store') }}">
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Title</label>
                            <input type="text" name='title' class="form-control" id="exampleInputEmail1" value="{{ old('title') }}" placeholder="Enter the title...">
                        </div>
                        @error('title')
                        <p style="color:red">*{{ $message }}</p>
                        @enderror

                        <div class="form-group mt-3 mb-2">
                            <label for="exampleInputPassword1">Description</label>
                            <textarea name="description" class="form-control" id="exampleInputPassword1" value="{{ old('description') }}" placeholder="Enter the description..." cols="30" rows="5"></textarea>
                        </div>
                        @error('description')
                        <p style="color:red">*{{ $message }}</p>
                        @enderror

                        <button type="submit" class="btn btn-primary mt-1">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
