@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
@foreach($all as $post)
        <div class="col-md-10 offset-md-1 pt-4">
            <div class="card">
                <div class="card-body">
                    <div class="h3">
                        {{$post->title}}
                    </div>
                </div>
                <div class="card-footer">
                <a href="/blog/{{$post->id}}" class="btn btn-success">Show</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
