
@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/profile/store" enctype="multipart/form-data" method="post">
            @csrf

            <div class="row">
                <div class="col-8 offset-2">

                    <div class="row">
                        <h1>Add details</h1>
                    </div>
                    <div class="form-group row">
                        <label for="title" class="col-md-4 col-form-label">Title</label>

                        <input id="title"
                               type="text"
                               class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"
                               name="title"

                               autocomplete="title" autofocus>

                        @if ($errors->has('title'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-4 col-form-label">description</label>

                        <input id="description"
                               type="text"
                               class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                               name="description"

                               autocomplete="description" autofocus>

                        @if ($errors->has('description'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group row">
                        <label for="url" class="col-md-4 col-form-label">url</label>

                        <input id="url"
                               type="text"
                               class="form-control{{ $errors->has('url') ? ' is-invalid' : '' }}"
                               name="url"

                               autocomplete="url" autofocus>

                        @if ($errors->has('url'))
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('url') }}</strong>
                        </span>
                        @endif
                    </div>






                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                        </div>
                    </div>




                </div>

        </form>

        <form action="/uploadProfile" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="file" name="image"/>


        </form>


    </div>
@endsection
