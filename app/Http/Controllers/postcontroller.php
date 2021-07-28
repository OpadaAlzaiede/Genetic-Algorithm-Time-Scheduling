<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Post;
class postcontroller extends Controller
{
  public function __construct(){
    $this->middleware('auth');
  }

  public function deletepost( $id){
    $val=Post::find($id);
    $val->delete();
    return redirect ('doctor');
  }

  public function create(Request $req, $id){
    $val=request()-> validate([
        'title'=>'required',
        'summary-ckeditor'=>'required',
        'inpFile'=>'required',
    ]);
    if($req->hasfile('inpFile')){
    $file=$req->file('inpFile');
    $extension=$file->getClientOriginalExtension();
    $filename = time() . '.' . $extension;
    $file->move('../public',$filename);

    $createdby=' ';
    if (Auth::user()-> groupid == 2) {
        $createdby = 'admin';
    }elseif (Auth::user()-> groupid == 1) {
      $createdby = Auth::user()->username;
    }
//    $val=new Post;
  //  $val-> user_id=Auth::user()->id;
//    $val-> title= $req ->input('title');
//    $val-> description= $req ->input('summary-ckeditor');
//    $val -> img = $filename;
//    $val -> save();
auth()->user()->posts()->Create([
      'title' => $req ->input('title'),
      'description' => $req ->input('summary-ckeditor'),
      'img' => $filename,
      'by' => $createdby,
]);
  if(Auth::user()->groupid == 2){
    return redirect ('admin');
  }elseif (Auth::user()-> groupid == 1) {

    return redirect ('doctor');
  }
  }

    }
}
