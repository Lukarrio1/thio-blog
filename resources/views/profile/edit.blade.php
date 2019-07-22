@extends('layouts.app') @section('title') Account @endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-white h3">
                    Edit Profile
                </div>
                <div class="card-body">
                    <form id="updateprofile">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="profilename">Name</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="profilename"
                                />
                            </div>
                            <div class="form-group col-6">
                                <label for="profilemail">Email</label>
                                <input
                                    type="text"
                                    class="form-control "
                                    id="profilemail"
                                />
                            </div>
                        </div>
                        <div class="col-12 text-center">
                            <button class="btn btn-success" id="updateprofile">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-white">
                    <img
                        src="https://images.unsplash.com/photo-1563730031910-60f14687e33a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80"
                        alt=""
                        srcset=""
                        style="width:100%"
                    />
                </div>
                <div class="card-body">
                    <div>
                        <span class="h6">Name</span>:
                        <span id="">Jason</span>
                    </div>
                    <div>
                        <span class="h6">Email</span>:
                        <span id="">tomennis1997@gmail.com</span>
                    </div>
                </div>
                <div class="card-footer bg-white text-center">
                    <div>
                        <a href="#" class="btn btn-warning">Change Password</a>
                    </div>
                    <div>
                        <a href="#" class="btn btn-info">Change Picture</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
