@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 pt-5">
            <form method="POST" action="/blog">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" name="title">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <textarea class="form-control" name="body" rows="3"></textarea>
                </div>
                <button class="btn btn-success" type="submit">Post</button>
            </form>
        </div>
    </div>
</div>
@endsection
