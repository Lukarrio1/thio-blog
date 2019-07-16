@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 offset-md-1 pt-4">
            <div class="card">
                <div class="card-body">
                    <div class="h3">
                        {{$post->title}}
                    </div>
                    <div class="h5">
                        {{$post->body}}
                    </div>
                </div>
                <div class="card-footer">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <form method="POST" action="/blog/{{$post->id}}">
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                </form>
                            </div>
                            <div class="col-md-3">
                            <a href="/blog/{{$post->id}}/edit" class="btn btn-warning text-left">Edit</a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection
