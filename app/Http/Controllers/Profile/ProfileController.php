<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\json;
use App\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function edit(){
        return view('profile.edit');
    }

    public function User(){
        $user = User::find(Auth::user()->id);
        return new json($user);
    }

    public function update(Request $request){
        $this->validate($request,[
            'name'=>'required',
            'email'=>'required|email'
        ]);
        $user = User::find(Auth::user()->id);
        $like = User::where('email',htmlentities($request->email))->first();
        if($this->validateEmail($like,$user)==0){
            $user->name = htmlentities($request->name);
            $user->email = htmlentities($request->email);
            $user->save();
            return new json(['status'=>200]);
        }else{
            return new json(['status'=>403]);
        }
    }

    public function validateEmail($like,$email){
        if(empty($like)){
            return 0;
        }else if($like->id==$email->id){
            return 0;
        }else{
            return 1;
        }
    }

    public function picture(Request $request){
        $this->validate($request,['file'=> 'mimes:jpeg,jpg,png|max:1999|required']);
          $user = User::find(Auth::user()->id);
         $filenameWithExt = $request->file('file')->getClientOriginalName();
         $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
         $extension = $request->file('file')->getClientOriginalExtension();
         $filenametostore = $filename . '_' . time() . '.' .$extension;
         $path = $request->file('file')->storeAs('public/profile', $filenametostore);
         if($user->image=='noimage.jpg'){
            $user->image = $filenametostore;
            $user->save();
            return new json(['status'=>200]);
         }else{
            Storage::delete('public/profile/' . $user->image); 
            $user->image = $filenametostore;
            $user->save();
            return new json(['status'=>200]);
         }
       
    }

    public function removePicture(){
        $user = User::find(Auth::user()->id);
        Storage::delete('public/profile/' . $user->image); 
        $user->image ='noimage.jpg';
        $user->save();
        return new json(['status'=>200]);
    }
}
