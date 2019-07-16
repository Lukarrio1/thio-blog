@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5">
        <form method="POST" action="/blog/{{$edit->id}}">
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                <input type="text" class="form-control" name="title" value="{{$edit->title}}">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                <textarea class="form-control" name="body" rows="3">{{$edit->body}}</textarea>
                </div>
                <button class="btn btn-success" type="submit">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
