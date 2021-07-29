@extends('todos.layout')



@section('content')


    <h2 class="text-2xl"> I need to-do is</h2>
    @include('layouts.flash')
    <form class="py-5" action="/todos/create" method="post">
        @csrf
        <div class="py-1">
            <input type="text" name="title" placeholder="title" class="py-2 px-2 border rounded-lg">
        </div>
        <div class="py-2">
            
            <textarea name="Details" class="p-2 rounded border" placeholder="Details"></textarea>
        </div>
       <div class="py-1">
           <input type="submit" value="Create" class="p-2 border rounded-lg">
       </div>

    </form>
<a href="/todos" class="m-5 py-1 px-1 bg-pink-400 cursor-pointer rounded text-white">Back </a>



@endsection
