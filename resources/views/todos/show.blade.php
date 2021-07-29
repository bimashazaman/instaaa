@extends('todos.layout')



@section('content')




    @include('layouts.flash')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <form>
    <h2 class="text-2xl pb-4" > {{$todo->title}}</h2>
    <div>
        <div>
            <p class="">
                {{$todo->Details}}
            </p>
        </div>
    </div>
                        <div>
    <a href="/todos" class="m-5 py-1 px-1 bg-pink-400 cursor-pointer rounded text-white">Back </a>
                        </div>
                    </form>
               </div>
            </div>
        </div>
    </div>


@endsection
