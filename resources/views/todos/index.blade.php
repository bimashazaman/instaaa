<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8">
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet"/>

    <title>Todos</title>
</head>
<body>
<div class="text-center pt-10">
    <div class="flex justify-between border-b pb-4 px-4">
    <h1 class="text-2xl"><b>Todos</b></h1>
        <a href="/todos/create" class="mx-5 py-2 text-blue-400 cursor-pointer text-white ">----->
            <span class="fas fa-plus-circle"/>
        </a>
    </div>
    @include('layouts.flash')
    <div class="flex justify-center">

    <div class=" w-1/3 border border-gray-400 rounded ">
    <ul class="my-5 ">
        @if($todos->count() > 0)
        @foreach($todos as $todo)
            <li class="flex justify-between py-3 border-b px-4">
                <div>
                    @include('todos.button')

                </div>

                @if($todo->completed)
                <p class="line-though">{{$todo->title}}</p>
                @else
                    <a class="cursor-pointer" href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
                @endif
                <div>

                    <a href="{{'/todos/'.$todo->id.'/edit'}}" class=" text-blue-400 cursor-pointer  text-white">


                        <span class="fas fa-edit px-2 "/> </a>




                        <span class="fas fa-trash text-red-500 px-2 cursor-pointer" onclick="event.preventDefault();
                    if (confirm('Are you sure?')){
                            document.getElementById('form-delete-{{$todo->id}}')
                            .submit()
                            }
                            "/>

                    <form style="display:none" id="{{'form-delete-'.$todo->id}}" method="post" action="{{route('todo.delete', $todo->id)}}">
                        @csrf
                        @method('delete')

                    </form>


                </div>

            </li>
        @endforeach
        @else
        <p>Create task please!</p>
        @endif

        </ul>

</div>
    </div>
</div>
</body>
</html>















