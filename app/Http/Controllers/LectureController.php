<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pdf;
use Response;
class LectureController extends Controller
{
    public function addpdfs (Request $req){
      $val=request()-> validate([
        'lecture_name'=>'required',
      //  'lecture_year'=>'required',
      //  'section'=>'required',
    //    'type'=>'required',

      ]);
      if($req->hasfile('uploadfile')){
      $file=$req->file('uploadfile');
      $extension=$file->getClientOriginalExtension();
      $filename = $file->getClientOriginalName();
      $file->move('../public/pdfs',$filename);


        //echo "fff";
        //$val=new lect;
        //$val-> user_id=Auth::user()->id;
        //$val-> lecture= $req ->input('lecture_name');
        //$val-> section= $req ->input('section');
        //$val-> type= $req ->input('type');
      //  $val-> lecture_year= $req ->input('lecture_year');
      //  $val -> file = $filename;
      //  $val -> save();

      auth()->user()->pdfs()->Create([
        'title'=> $req ->input('lecture_name'),
        'subjectName' => $req ->input('subjectName'),
        'year'=> $req ->input('year'),
        'type'=> $req ->input('type'),
        'pdf'=> $filename,

     ]);

     return redirect('doctor');



    }
  }

  public function download($id) {
    $d = Pdf::find($id);
    $file = base_path('public/pdfs/'.$d->pdf);
    return response::download($file);
  }
}
