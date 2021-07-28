<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\post;

class studentcontroller extends Controller
{
  public function show (){
    $user=Auth::user();
    return view ('student.student_profile',compact('user'));

  }

  public function editpro (Request $req , $id){

    $val= User::find($id);
    $val -> username = $req -> input('username');
    $val -> email = $req -> input('email');
    $val -> address = $req ->input('address');
    $val -> phonenumber = $req ->input('phonenumber');
    $val -> save();

    return redirect ('student_profile');
  }

  public function updatephoto(Request $req, $id){
    if($req->hasfile('uploadimage')){
    $file=$req->file('uploadimage');
    $extension=$file->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $file->move('../public',$filename);

    $val=User::find($id);
    $val -> img = $filename;
    $val -> save();

    return redirect ('student_profile');
    }

  }

 
}
