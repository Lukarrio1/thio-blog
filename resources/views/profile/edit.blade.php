@extends('layouts.app')
@section('title') Account
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8  mt-4">
            <div class="card">
                <div class="card-header bg-white h3">
                   <span class="h2 text-success"><i class="fas fa-user-alt"></i></span>  Edit Profile
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
                            <button class="btn btn-success" type="submit">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card">
                <div class="card-header bg-white">
                    <img
                        src=""
                        alt=""
                        srcset=""
                        style="width:100%"
                        id="regularprofilepic"
                    />
                </div>
                <div class="card-body">
                    <div>
                        <span class="h6">Name</span>:
                        <span id="profilecardname"></span>
                    </div>
                    <div>
                        <span class="h6">Email</span>:
                        <span id="profilecardemail"></span>
                    </div>
                </div>
                <div class="card-footer bg-white text-center">
                    <div>
                        <a href="#" class="btn btn-warning">Change Password</a>
                    </div>
                    <div>
                        <a href="#" class="btn btn-info" data-toggle="modal" data-target="#pictureChanges">Change Picture</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <div class="modal fade" id="pictureChanges" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel"> <img
            src=""
            alt=""
            srcset=""
            style="width:100%"
            id="profileimage"
        /></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <input type="file" name="" id="profilepicform">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" id="closeprofilePicForm">Close</button>
          <button class="btn btn-primary"  id="ProfilePicForm">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
