@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card">

                    <div class="d-inline-block card-header">{{ __('All Tasks') }}
                        <a title="add new task"
                           class="w-25 text-decoration-none text-bg-primary text-white p-2"
                           style="border-radius: 10px;margin-left:80%"
                           href="{{ route('todo.create') }}">Add Task</a>
                    </div>
                    @if(session('newTask'))
                        <div class="alert alert-success text-center" id="notify">{{ session('newTask') }}</div>
                    @endif
                    @if(session('updateTask'))
                        <div class="alert alert-success text-center" id="notify">{{ session('updateTask') }}</div>
                    @endif @if(session('delTask'))
                        <div class="alert alert-success text-center" id="notify">{{ session('delTask') }}</div>
                    @endif
                    <div class="card-body">
                        @if($tasks->count() >= 1 )
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th scope="col" class="text-center">#</th>
                                    <th scope="col" class="text-center">Title</th>
                                    <th scope="col" class="text-center">Description</th>
                                    <th scope="col" class="text-center">Completed</th>
                                    <th scope="col" class="text-center">Actions</th>
                                </tr>
                                </thead>

                                <tbody>
                                @php
                                    $count=0;
                                @endphp
                                @foreach ($tasks as $task)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <td scope="row">{{ $count }}</td>

                                        @if (\App\Models\Todo::latest()->take(1)->first()->id == $task->id)

                                            <td class="text-center">
                                                {{ $task->title }}

                                                @if(session('newTask' ))
                                                    <span id="notify2"
                                                          style="font-weight: 700;margin-left: 5px;color:rgba(10, 99, 242, 0.883)">new</span>
                                                @endif  @if(session('updateTask' ))
                                                    <span id="notify2"
                                                          style="font-weight: 700;margin-left: 5px;color:rgba(10, 99, 242, 0.883)">updated</span>
                                                @endif

                                            </td>

                                        @else
                                            <td class="text-center">
                                                {{ $task->title }}
                                            </td>
                                        @endif

                                        <td class="text-center">{{ $task->description }}</td>

                                        <td class="text-center">
                                            @if($task->is_completed == 1)
                                                <span class="bg-success p-1 rounded-1 text-white"> Completed</span>
                                            @else
                                                <span class="bg-danger p-1 rounded-1 text-white">Not Complete</span>
                                            @endif
                                        </td>
                                        <td class="text-center">
                                            @if($task->is_completed==1)
                                                <a title="edit item"
                                                   class="w-25 text-decoration-none text-bg-success text-white p-1"
                                                   style="border-radius:5px"
                                                   href="{{ route('todo.show',$task->id) }}">View</a>
                                            @endif

                                            <a title="edit item"
                                               class="w-25 text-decoration-none text-bg-primary text-white p-1"
                                               style="border-radius:5px"
                                               href="{{ route('todo.edit',$task->id) }}">Edit</a>

                                            <form action="{{ route('todo.destroy',$task->id) }}" method="post"
                                                  class="d-inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" title="delete item"

                                                        style="border: none;color:white;background-color: red;padding:3px;border-radius:5px"
                                                        href="">Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            <div style="color: red;" class='text-center'>No Tasks Available !</div>
                        @endif
                    </div>
                </div>
                {{ $tasks->links() }}
            </div>
        </div>
        <script>
            setTimeout(() => {
                let x = document.getElementById('notify');
                x.style.display = "none";
            }, 3000);

            setTimeout(() => {
                let x2 = document.getElementById('notify2');
                x2.style.display = "none";
            }, 10000);

        </script>
    </div>
@endsection
